<?php
declare(strict_types=1);

namespace libgccjit;

class CodeGen {
    private \FFIMe\Compiler $compiler;
    private array $types = [];
    private array $functions = [];
    private string $enumCode = '';

    public function __construct() {
        $this->compiler = new \FFIMe\Compiler;
    }

    public function generate(): string {
        $tokens = $this->compiler->compile('/usr/lib/gcc/x86_64-linux-gnu/6/include/libgccjit.h');
        $this->extractTypes($tokens);
        $this->extractFunctions($tokens);
        $this->extractEnums($tokens);
        $length = count($this->functions);
        $i = 0;
        while ($i < $length) {
            $this->extractTypesFromFunction($this->functions[$i++]);
        }
        $code = '<?php declare(strict_types=1);

function __gcc_jit_getFFI(): \FFIMe\FFIMe {
    static $ffi = null;
    if (!$ffi) {
        $ffi = (new \FFIMe\FFIMe(\'/usr/lib/x86_64-linux-gnu/libgccjit.so.0\'))
          ->include(\'/usr/lib/gcc/x86_64-linux-gnu/6/include/libgccjit.h\')
          ->build();
    }
    return $ffi;
}

function __gcc_jit_getCallable(string $type, void_ptr $void): callable {
    $cb = __gcc_jit_getFFI()->new($type);
    \FFI::memcpy(
        \FFI::addr($cb), 
        \FFI::addr($void->getData()), 
        \FFI::sizeof($cb)
    );
    return $cb;
}

';
        $code .= $this->enumCode;
        $code .= $this->codeGenTypes();
        $code .= $this->codeGenFunctions();
        return $code;
    }

    private function extractTypesFromFunction(FunctionDef $func): void {
        $this->addType($func->returnType);
        $length = count($func->args);
        $i = 0;
        while ($i < $length) {
            $arg = $func->args[$i++];
            $this->addType($arg->type);
        }
    }

    private function extractTypes(array $tokens): void {
        $length = count($tokens);
        $i = 0;
        while ($i < $length) {
            $line = $tokens[$i++];
            if ($line->type === \FFIMe\Token::IDENTIFIER && $line->value === 'extern') {
                $line = $line->next;
            }
            if ($line->type === \FFIMe\Token::IDENTIFIER && $line->value === 'typedef') {
                // find name
                do {
                    $prev = $line;
                    $line = $line->next;
                } while (!is_null($line) && $line->value !== ';');
                if (!is_null($line)) {
                    // name is in prev here
                    if ($prev->type !== \FFIMe\Token::IDENTIFIER) {
                        var_dump($prev, $line);
                        die("failed determining type's name");
                    }
                    $this->addType($prev->value);
                }
            }
        }
    }

    private function extractEnums(array $tokens): void {
        $length = count($tokens);
        $i = 0;
        while ($i < $length) {
            $line = $tokens[$i++];
            if ($line->type === \FFIMe\Token::IDENTIFIER && $line->value === 'enum') {
                $ctr = 0;
                $line = $line->next;
                assert($line->type === \FFIMe\Token::IDENTIFIER);
                $line = $line->next;
                assert($line->type === \FFIMe\Token::PUNCTUATOR && $line->value === '{');
                $line = $line->next;
                while (true) {
                    assert($line->type === \FFIMe\Token::IDENTIFIER);
                    $this->enumCode .= 'const ' . $line->value . ' = ' . $ctr++ . ';
';
                    $line = $line->next;
                    if ($line->type === \FFIMe\Token::PUNCTUATOR && $line->value === ',') {
                        $line = $line->next;
                    } elseif ($line->type !== \FFIMe\Token::PUNCTUATOR || $line->value !== '}') {
                        var_dump($line);
                        die("Unknown enum value type\n");
                    } else {
                        break;
                    }

                }
                
            }
        }
    }

    private function findType(string $type): ?Type {
        $length = count($this->types);
        $i = 0;
        while ($i < $length) {
            $candidate = $this->types[$i++];
            if ($candidate->type === $type) {
                return $candidate;
            } elseif ($candidate->name === $type) {
                // used for mapping native types
                return $candidate;
            }
        }
        return null;
    }

    private function addType(string $type): ?Type {
        if ($type === 'void') {
            return null;
        }
        $test = $this->findType($type);
        if (!is_null($test)) {
            return $test;
        }
        $typeName = $type;
        if (substr($typeName, 0, 5) === 'char*') {
            $typeName = 'string' . substr($typeName, 5);
        } elseif (substr($typeName, 0, 6) === 'size_t') {
            $typeName = 'int' . substr($typeName, 6);
        }
        $typeName = str_replace('*', '_ptr', $typeName);
        
        
        if (substr($type, -1) === '*') {
            $root = $this->addType(substr($type, 0, -1));
            return $this->types[] = new Type($typeName, $type, $root);
        } else {
            return $this->types[] = new Type($typeName, $type);
        }
    }


    private function extractFunctions(array $tokens): void {
        $length = count($tokens);
        $i = 0;
        while ($i < $length) {
            $line = $tokens[$i++];
            if ($line->type === \FFIMe\Token::IDENTIFIER && $line->value === 'extern') {
                $line = $line->next;
            }
            if ($line->type === \FFIMe\Token::IDENTIFIER && ($line->value === 'typedef' || $line->value === 'enum')) {
                // skip typedefs
                continue;
            }
            if ($line->type === \FFIMe\Token::IDENTIFIER) {
                $returnDef = $this->extractType($line);
                $line = $returnDef->next;
                assert($line->type === \FFIMe\Token::IDENTIFIER);
                $funcName = $line->value;
                $line = $line->next;
                assert($line->type === \FFIMe\Token::PUNCTUATOR && $line->value === '(');
                $line = $line->next;
                $args = [];
                while ($line->type !== \FFIMe\Token::PUNCTUATOR || $line->value !== ')') {
                    $arg = $this->extractType($line);
                    $line = $arg->next;
                    if ($line->type === \FFIMe\Token::IDENTIFIER) {
                        // named param
                        $args[] = new ArgDef($arg->type, $line->value);
                        if ($line->next->type === \FFIMe\Token::PUNCTUATOR && $line->next->value === ',') {
                            $line = $line->next->next;
                        } else {
                            // no trailing comma, end of args?
                            $line = $line->next;
                            break;
                        }
                    } elseif ($arg->type === 'void') {
                        break;
                    } else {
                        var_dump($arg,  $line);
                        die("Unknown state");
                    }
                }
                if ($line->type === \FFIMe\Token::PUNCTUATOR && $line->value === ')') {
                    // end of function
                    $this->functions[] = new FunctionDef($funcName, $returnDef->type, ...$args);
                } else {
                    // dunno what happened
                    var_dump($line, $args);
                    die("Unknown failure 2 in $funcName\n");
                }
            }
        }
    }

    private function extractType(\FFIMe\Token $line): TypeDef {
        if ($line->type !== \FFIMe\Token::IDENTIFIER) {
            var_dump($line);
            die("Failed type extraction\n");
        }
        if ($line->value === 'const') {
            // ignore const
            return $this->extractType($line->next);
        }
        if ($line->value === 'enum') {
            // skip enum and return int
            assert($line->next->type === \FFIMe\Token::IDENTIFIER);
            // ignore the enum type
            $line = $line->next;
            $type = 'size_t';
        } else {
            $type = $line->value;
        }
        $line = $line->next;
        while ($line->type === \FFIMe\Token::PUNCTUATOR && $line->value === '*') {
            $type = $type . '*';
            $line = $line->next;
        }
        return new TypeDef($type, $line);
    }

    private function codeGenTypes(): string {
        $code = '';
        $length = count($this->types);
        $i = 0;
        while ($i < $length) {
            $type = $this->types[$i++];
            if ($type->isNative()) {
                continue;
            }
            $code .= '
class ' . $type->name . ' { 
    private \FFI\CData $data;
    public function __construct(\FFI\CData $data) {
        $this->data = $data;
    }
    public function getData(): \FFI\CData {
        return $this->data;
    }
    public function castTo(string $type): \FFI\CData {
        return __gcc_jit_getFFI()->cast($type, $this->data);
    }
    public function equals(' . $type->name .' $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type(\'' . $type->type . '\');
    }
';
            switch ($type->name) {
                case 'gcc_jit_lvalue_ptr':
                    $code .= '
    public function asRValue(): gcc_jit_rvalue_ptr {
        return gcc_jit_lvalue_as_rvalue($this);
    }
';
                    break;
                case 'gcc_jit_param_ptr':
                    $code .= '
    public function asRValue(): gcc_jit_rvalue_ptr {
        return gcc_jit_param_as_rvalue($this);
    }
    public function asLValue(): gcc_jit_lvalue_ptr {
        return gcc_jit_param_as_lvalue($this);
    }
';
                    break;
                case 'gcc_jit_type_ptr':
                    $code .= '
    public function getPointer(): gcc_jit_type_ptr {
        return gcc_jit_type_get_pointer($this);
    }
    public function getConst(): gcc_jit_type_ptr {
        return gcc_jit_type_get_const($this);
    }
';
            }
            if (strpos($type->type, '**') !== false) {
                // array methods:
                $code .= '
    public static function fromArray(?'. $type->child->name .' ...$data): self {
        $ffi = __gcc_jit_getFFI();
        $cData = $ffi->new(\'' . $type->child->type . '[\' . count($data) . \']\');
        foreach ($data as $key => $raw) {
            $cData[$key] = ' . ($type->child->isNative() ? '$raw' : 'is_null($raw) ? null : $raw->getData()') . ';
        }
        return new self($cData);
    }
';
            }

            $code .= '
}
';
        }
        return $code;
    }

    private function codeGenFunctions(): string {
        $code = '';
        $length = count($this->functions);
        $i = 0;
        while ($i < $length) {
            $function = $this->functions[$i++];
            $code .= '
function ' . $function->name . '(';
            $argLength = count($function->args);
            $argPos = 0;
            $callBody = '';
            while ($argPos < $argLength) {
                $arg = $function->args[$argPos++];
                $type = $this->findType($arg->type);
                assert(!is_null($type));
                $code .= '
    ' . ($type->isPointer() ? '?' : '') . $type->name . ' $' . $arg->name;
                $callBody .= '
        ' . ($type->isPointer() ? 'is_null($' . $arg->name . ') ? null : ' : '') . '$' . $arg->name . ($type->isNative() ? '' : '->getData()');
                if ($argPos < $argLength) {
                    $code .= ',';
                    $callBody .= ', ';
                }
            }
$code .= '
): ';
            $type = $this->findType($function->returnType);
            if (is_null($type)) {
                $code .= 'void';
            } else {
                $code .= $type->name;
            }
            $code .= ' {
    ';
            if (!is_null($type)) {
                $code .= 'return new ' . $type->name . '(';
            }
            $code .= '__gcc_jit_getFFI()->' . $function->name . '(' . $callBody . ')';
            if (!is_null($type)) {
                $code .= ')';
            }
            $code .= ';
}
';
        }
        return $code;
    }
}

class Type {
    public string $name;
    public string $type;
    public ?Type $child;
    public function __construct(string $name, string $type, ?Type $child = null) {
        switch ($type) {
            case 'long':
            case 'long long':
                $name = 'int';
                break;
            case 'double':
                $name = 'float';
                break;
        }
        $this->name = $name;
        $this->type = $type;
        $this->child = $child;
    }
    public function isPointer(): bool {
        return strpos($this->name, '_ptr') !== false;
    }
    public function isNative(): bool {
        switch ($this->type) {
            case 'float':
            case 'double':
            case 'char*':
            case 'char':
            case 'size_t':
            case 'long':
            case 'int':
                return true;
        }
        return false;
    }
}

class TypeDef {
    public string $type;
    public \FFIMe\Token $next;

    public function __construct(string $type, \FFIMe\Token $next) {
        $this->type = $type;
        $this->next = $next;
    }
}

class ArgDef {
    public string $type;
    public string $name;

    public function __construct(string $type, string $name) {
        $this->type = $type;
        $this->name = $name;
    }
}

class FunctionDef {
    public string $name;
    public string $returnType;
    public array $args;

    public function __construct(string $name, string $returnType, ArgDef ... $args) {
        $this->name = $name;
        $this->returnType = $returnType;
        $this->args = $args;
    }
}