<?php declare(strict_types=1);

function __gcc_jit_getFFI(): \FFIMe\FFIMe {
    static $ffi = null;
    if (!$ffi) {
        $ffi = (new \FFIMe\FFIMe('/usr/lib/x86_64-linux-gnu/libgccjit.so.0'))
          ->include('/usr/lib/gcc/x86_64-linux-gnu/6/include/libgccjit.h')
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

const GCC_JIT_STR_OPTION_PROGNAME = 0;
const GCC_JIT_NUM_STR_OPTIONS = 1;
const GCC_JIT_INT_OPTION_OPTIMIZATION_LEVEL = 0;
const GCC_JIT_NUM_INT_OPTIONS = 1;
const GCC_JIT_BOOL_OPTION_DEBUGINFO = 0;
const GCC_JIT_BOOL_OPTION_DUMP_INITIAL_TREE = 1;
const GCC_JIT_BOOL_OPTION_DUMP_INITIAL_GIMPLE = 2;
const GCC_JIT_BOOL_OPTION_DUMP_GENERATED_CODE = 3;
const GCC_JIT_BOOL_OPTION_DUMP_SUMMARY = 4;
const GCC_JIT_BOOL_OPTION_DUMP_EVERYTHING = 5;
const GCC_JIT_BOOL_OPTION_SELFCHECK_GC = 6;
const GCC_JIT_BOOL_OPTION_KEEP_INTERMEDIATES = 7;
const GCC_JIT_NUM_BOOL_OPTIONS = 8;
const GCC_JIT_OUTPUT_KIND_ASSEMBLER = 0;
const GCC_JIT_OUTPUT_KIND_OBJECT_FILE = 1;
const GCC_JIT_OUTPUT_KIND_DYNAMIC_LIBRARY = 2;
const GCC_JIT_OUTPUT_KIND_EXECUTABLE = 3;
const GCC_JIT_TYPE_VOID = 0;
const GCC_JIT_TYPE_VOID_PTR = 1;
const GCC_JIT_TYPE_BOOL = 2;
const GCC_JIT_TYPE_CHAR = 3;
const GCC_JIT_TYPE_SIGNED_CHAR = 4;
const GCC_JIT_TYPE_UNSIGNED_CHAR = 5;
const GCC_JIT_TYPE_SHORT = 6;
const GCC_JIT_TYPE_UNSIGNED_SHORT = 7;
const GCC_JIT_TYPE_INT = 8;
const GCC_JIT_TYPE_UNSIGNED_INT = 9;
const GCC_JIT_TYPE_LONG = 10;
const GCC_JIT_TYPE_UNSIGNED_LONG = 11;
const GCC_JIT_TYPE_LONG_LONG = 12;
const GCC_JIT_TYPE_UNSIGNED_LONG_LONG = 13;
const GCC_JIT_TYPE_FLOAT = 14;
const GCC_JIT_TYPE_DOUBLE = 15;
const GCC_JIT_TYPE_LONG_DOUBLE = 16;
const GCC_JIT_TYPE_CONST_CHAR_PTR = 17;
const GCC_JIT_TYPE_SIZE_T = 18;
const GCC_JIT_TYPE_FILE_PTR = 19;
const GCC_JIT_TYPE_COMPLEX_FLOAT = 20;
const GCC_JIT_TYPE_COMPLEX_DOUBLE = 21;
const GCC_JIT_TYPE_COMPLEX_LONG_DOUBLE = 22;
const GCC_JIT_FUNCTION_EXPORTED = 0;
const GCC_JIT_FUNCTION_INTERNAL = 1;
const GCC_JIT_FUNCTION_IMPORTED = 2;
const GCC_JIT_FUNCTION_ALWAYS_INLINE = 3;
const GCC_JIT_GLOBAL_EXPORTED = 0;
const GCC_JIT_GLOBAL_INTERNAL = 1;
const GCC_JIT_GLOBAL_IMPORTED = 2;
const GCC_JIT_UNARY_OP_MINUS = 0;
const GCC_JIT_UNARY_OP_BITWISE_NEGATE = 1;
const GCC_JIT_UNARY_OP_LOGICAL_NEGATE = 2;
const GCC_JIT_UNARY_OP_ABS = 3;
const GCC_JIT_BINARY_OP_PLUS = 0;
const GCC_JIT_BINARY_OP_MINUS = 1;
const GCC_JIT_BINARY_OP_MULT = 2;
const GCC_JIT_BINARY_OP_DIVIDE = 3;
const GCC_JIT_BINARY_OP_MODULO = 4;
const GCC_JIT_BINARY_OP_BITWISE_AND = 5;
const GCC_JIT_BINARY_OP_BITWISE_XOR = 6;
const GCC_JIT_BINARY_OP_BITWISE_OR = 7;
const GCC_JIT_BINARY_OP_LOGICAL_AND = 8;
const GCC_JIT_BINARY_OP_LOGICAL_OR = 9;
const GCC_JIT_BINARY_OP_LSHIFT = 10;
const GCC_JIT_BINARY_OP_RSHIFT = 11;
const GCC_JIT_COMPARISON_EQ = 0;
const GCC_JIT_COMPARISON_NE = 1;
const GCC_JIT_COMPARISON_LT = 2;
const GCC_JIT_COMPARISON_LE = 3;
const GCC_JIT_COMPARISON_GT = 4;
const GCC_JIT_COMPARISON_GE = 5;

class FILE { 
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
    public function equals(FILE $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('FILE');
    }

}

class gcc_jit_context { 
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
    public function equals(gcc_jit_context $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_context');
    }

}

class gcc_jit_result { 
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
    public function equals(gcc_jit_result $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_result');
    }

}

class gcc_jit_object { 
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
    public function equals(gcc_jit_object $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_object');
    }

}

class gcc_jit_location { 
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
    public function equals(gcc_jit_location $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_location');
    }

}

class gcc_jit_type { 
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
    public function equals(gcc_jit_type $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_type');
    }

}

class gcc_jit_field { 
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
    public function equals(gcc_jit_field $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_field');
    }

}

class gcc_jit_struct { 
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
    public function equals(gcc_jit_struct $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_struct');
    }

}

class gcc_jit_function { 
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
    public function equals(gcc_jit_function $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_function');
    }

}

class gcc_jit_block { 
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
    public function equals(gcc_jit_block $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_block');
    }

}

class gcc_jit_rvalue { 
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
    public function equals(gcc_jit_rvalue $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_rvalue');
    }

}

class gcc_jit_lvalue { 
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
    public function equals(gcc_jit_lvalue $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_lvalue');
    }

}

class gcc_jit_param { 
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
    public function equals(gcc_jit_param $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_param');
    }

}

class gcc_jit_case { 
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
    public function equals(gcc_jit_case $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_case');
    }

}

class gcc_jit_timer { 
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
    public function equals(gcc_jit_timer $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_timer');
    }

}

class gcc_jit_context_ptr { 
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
    public function equals(gcc_jit_context_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_context*');
    }

}

class gcc_jit_result_ptr { 
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
    public function equals(gcc_jit_result_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_result*');
    }

}

class FILE_ptr { 
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
    public function equals(FILE_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('FILE*');
    }

}

class void_ptr { 
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
    public function equals(void_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('void*');
    }

}

class gcc_jit_object_ptr { 
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
    public function equals(gcc_jit_object_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_object*');
    }

}

class gcc_jit_location_ptr { 
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
    public function equals(gcc_jit_location_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_location*');
    }

}

class gcc_jit_type_ptr { 
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
    public function equals(gcc_jit_type_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_type*');
    }

    public function getPointer(): gcc_jit_type_ptr {
        return gcc_jit_type_get_pointer($this);
    }
    public function getConst(): gcc_jit_type_ptr {
        return gcc_jit_type_get_const($this);
    }

}

class gcc_jit_field_ptr { 
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
    public function equals(gcc_jit_field_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_field*');
    }

}

class gcc_jit_struct_ptr { 
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
    public function equals(gcc_jit_struct_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_struct*');
    }

}

class gcc_jit_field_ptr_ptr { 
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
    public function equals(gcc_jit_field_ptr_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_field**');
    }

    public static function fromArray(?gcc_jit_field_ptr ...$data): self {
        $ffi = __gcc_jit_getFFI();
        $cData = $ffi->new('gcc_jit_field*[' . count($data) . ']');
        foreach ($data as $key => $raw) {
            $cData[$key] = is_null($raw) ? null : $raw->getData();
        }
        return new self($cData);
    }

}

class gcc_jit_type_ptr_ptr { 
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
    public function equals(gcc_jit_type_ptr_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_type**');
    }

    public static function fromArray(?gcc_jit_type_ptr ...$data): self {
        $ffi = __gcc_jit_getFFI();
        $cData = $ffi->new('gcc_jit_type*[' . count($data) . ']');
        foreach ($data as $key => $raw) {
            $cData[$key] = is_null($raw) ? null : $raw->getData();
        }
        return new self($cData);
    }

}

class gcc_jit_param_ptr { 
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
    public function equals(gcc_jit_param_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_param*');
    }

    public function asRValue(): gcc_jit_rvalue_ptr {
        return gcc_jit_param_as_rvalue($this);
    }
    public function asLValue(): gcc_jit_lvalue_ptr {
        return gcc_jit_param_as_lvalue($this);
    }

}

class gcc_jit_lvalue_ptr { 
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
    public function equals(gcc_jit_lvalue_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_lvalue*');
    }

    public function asRValue(): gcc_jit_rvalue_ptr {
        return gcc_jit_lvalue_as_rvalue($this);
    }

}

class gcc_jit_rvalue_ptr { 
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
    public function equals(gcc_jit_rvalue_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_rvalue*');
    }

}

class gcc_jit_function_ptr { 
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
    public function equals(gcc_jit_function_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_function*');
    }

}

class gcc_jit_param_ptr_ptr { 
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
    public function equals(gcc_jit_param_ptr_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_param**');
    }

    public static function fromArray(?gcc_jit_param_ptr ...$data): self {
        $ffi = __gcc_jit_getFFI();
        $cData = $ffi->new('gcc_jit_param*[' . count($data) . ']');
        foreach ($data as $key => $raw) {
            $cData[$key] = is_null($raw) ? null : $raw->getData();
        }
        return new self($cData);
    }

}

class gcc_jit_block_ptr { 
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
    public function equals(gcc_jit_block_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_block*');
    }

}

class gcc_jit_rvalue_ptr_ptr { 
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
    public function equals(gcc_jit_rvalue_ptr_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_rvalue**');
    }

    public static function fromArray(?gcc_jit_rvalue_ptr ...$data): self {
        $ffi = __gcc_jit_getFFI();
        $cData = $ffi->new('gcc_jit_rvalue*[' . count($data) . ']');
        foreach ($data as $key => $raw) {
            $cData[$key] = is_null($raw) ? null : $raw->getData();
        }
        return new self($cData);
    }

}

class gcc_jit_case_ptr { 
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
    public function equals(gcc_jit_case_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_case*');
    }

}

class gcc_jit_case_ptr_ptr { 
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
    public function equals(gcc_jit_case_ptr_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_case**');
    }

    public static function fromArray(?gcc_jit_case_ptr ...$data): self {
        $ffi = __gcc_jit_getFFI();
        $cData = $ffi->new('gcc_jit_case*[' . count($data) . ']');
        foreach ($data as $key => $raw) {
            $cData[$key] = is_null($raw) ? null : $raw->getData();
        }
        return new self($cData);
    }

}

class string_ptr { 
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
    public function equals(string_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('char**');
    }

    public static function fromArray(?string ...$data): self {
        $ffi = __gcc_jit_getFFI();
        $cData = $ffi->new('char*[' . count($data) . ']');
        foreach ($data as $key => $raw) {
            $cData[$key] = $raw;
        }
        return new self($cData);
    }

}

class gcc_jit_timer_ptr { 
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
    public function equals(gcc_jit_timer_ptr $other): bool {
        return $this->data == $other->data;
    }
    public static function new(): self {
        return new self(__gcc_jit_getFFII()->new(self::getType()));
    }
    public static function castFrom(\FFI\CData $data): self {
        return new self(__gcc_jit_getFFI()->cast(self::getType(), $data));
    }
    public static function getType(): \FFI\CType {
        return __gcc_jit_getFFI()->type('gcc_jit_timer*');
    }

}

function gcc_jit_context_acquire(
): gcc_jit_context_ptr {
    return new gcc_jit_context_ptr(__gcc_jit_getFFI()->gcc_jit_context_acquire());
}

function gcc_jit_context_release(
    ?gcc_jit_context_ptr $ctxt
): void {
    __gcc_jit_getFFI()->gcc_jit_context_release(
        is_null($ctxt) ? null : $ctxt->getData());
}

function gcc_jit_context_set_str_option(
    ?gcc_jit_context_ptr $ctxt,
    int $opt,
    string $value
): void {
    __gcc_jit_getFFI()->gcc_jit_context_set_str_option(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $opt, 
        $value);
}

function gcc_jit_context_set_int_option(
    ?gcc_jit_context_ptr $ctxt,
    int $opt,
    int $value
): void {
    __gcc_jit_getFFI()->gcc_jit_context_set_int_option(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $opt, 
        $value);
}

function gcc_jit_context_set_bool_option(
    ?gcc_jit_context_ptr $ctxt,
    int $opt,
    int $value
): void {
    __gcc_jit_getFFI()->gcc_jit_context_set_bool_option(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $opt, 
        $value);
}

function gcc_jit_context_set_bool_allow_unreachable_blocks(
    ?gcc_jit_context_ptr $ctxt,
    int $bool_value
): void {
    __gcc_jit_getFFI()->gcc_jit_context_set_bool_allow_unreachable_blocks(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $bool_value);
}

function gcc_jit_context_set_bool_use_external_driver(
    ?gcc_jit_context_ptr $ctxt,
    int $bool_value
): void {
    __gcc_jit_getFFI()->gcc_jit_context_set_bool_use_external_driver(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $bool_value);
}

function gcc_jit_context_add_command_line_option(
    ?gcc_jit_context_ptr $ctxt,
    string $optname
): void {
    __gcc_jit_getFFI()->gcc_jit_context_add_command_line_option(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $optname);
}

function gcc_jit_context_compile(
    ?gcc_jit_context_ptr $ctxt
): gcc_jit_result_ptr {
    return new gcc_jit_result_ptr(__gcc_jit_getFFI()->gcc_jit_context_compile(
        is_null($ctxt) ? null : $ctxt->getData()));
}

function gcc_jit_context_compile_to_file(
    ?gcc_jit_context_ptr $ctxt,
    int $output_kind,
    string $output_path
): void {
    __gcc_jit_getFFI()->gcc_jit_context_compile_to_file(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $output_kind, 
        $output_path);
}

function gcc_jit_context_dump_to_file(
    ?gcc_jit_context_ptr $ctxt,
    string $path,
    int $update_locations
): void {
    __gcc_jit_getFFI()->gcc_jit_context_dump_to_file(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $path, 
        $update_locations);
}

function gcc_jit_context_set_logfile(
    ?gcc_jit_context_ptr $ctxt,
    ?FILE_ptr $logfile,
    int $flags,
    int $verbosity
): void {
    __gcc_jit_getFFI()->gcc_jit_context_set_logfile(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($logfile) ? null : $logfile->getData(), 
        $flags, 
        $verbosity);
}

function gcc_jit_context_get_first_error(
    ?gcc_jit_context_ptr $ctxt
): string {
    return new string(__gcc_jit_getFFI()->gcc_jit_context_get_first_error(
        is_null($ctxt) ? null : $ctxt->getData()));
}

function gcc_jit_context_get_last_error(
    ?gcc_jit_context_ptr $ctxt
): string {
    return new string(__gcc_jit_getFFI()->gcc_jit_context_get_last_error(
        is_null($ctxt) ? null : $ctxt->getData()));
}

function gcc_jit_result_get_code(
    ?gcc_jit_result_ptr $result,
    string $funcname
): void_ptr {
    return new void_ptr(__gcc_jit_getFFI()->gcc_jit_result_get_code(
        is_null($result) ? null : $result->getData(), 
        $funcname));
}

function gcc_jit_result_get_global(
    ?gcc_jit_result_ptr $result,
    string $name
): void_ptr {
    return new void_ptr(__gcc_jit_getFFI()->gcc_jit_result_get_global(
        is_null($result) ? null : $result->getData(), 
        $name));
}

function gcc_jit_result_release(
    ?gcc_jit_result_ptr $result
): void {
    __gcc_jit_getFFI()->gcc_jit_result_release(
        is_null($result) ? null : $result->getData());
}

function gcc_jit_object_get_context(
    ?gcc_jit_object_ptr $obj
): gcc_jit_context_ptr {
    return new gcc_jit_context_ptr(__gcc_jit_getFFI()->gcc_jit_object_get_context(
        is_null($obj) ? null : $obj->getData()));
}

function gcc_jit_object_get_debug_string(
    ?gcc_jit_object_ptr $obj
): string {
    return new string(__gcc_jit_getFFI()->gcc_jit_object_get_debug_string(
        is_null($obj) ? null : $obj->getData()));
}

function gcc_jit_context_new_location(
    ?gcc_jit_context_ptr $ctxt,
    string $filename,
    int $line,
    int $column
): gcc_jit_location_ptr {
    return new gcc_jit_location_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_location(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $filename, 
        $line, 
        $column));
}

function gcc_jit_location_as_object(
    ?gcc_jit_location_ptr $loc
): gcc_jit_object_ptr {
    return new gcc_jit_object_ptr(__gcc_jit_getFFI()->gcc_jit_location_as_object(
        is_null($loc) ? null : $loc->getData()));
}

function gcc_jit_type_as_object(
    ?gcc_jit_type_ptr $type
): gcc_jit_object_ptr {
    return new gcc_jit_object_ptr(__gcc_jit_getFFI()->gcc_jit_type_as_object(
        is_null($type) ? null : $type->getData()));
}

function gcc_jit_context_get_type(
    ?gcc_jit_context_ptr $ctxt,
    int $type_
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_context_get_type(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $type_));
}

function gcc_jit_context_get_int_type(
    ?gcc_jit_context_ptr $ctxt,
    int $num_bytes,
    int $is_signed
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_context_get_int_type(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $num_bytes, 
        $is_signed));
}

function gcc_jit_type_get_pointer(
    ?gcc_jit_type_ptr $type
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_type_get_pointer(
        is_null($type) ? null : $type->getData()));
}

function gcc_jit_type_get_const(
    ?gcc_jit_type_ptr $type
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_type_get_const(
        is_null($type) ? null : $type->getData()));
}

function gcc_jit_type_get_volatile(
    ?gcc_jit_type_ptr $type
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_type_get_volatile(
        is_null($type) ? null : $type->getData()));
}

function gcc_jit_context_new_array_type(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_type_ptr $element_type,
    int $num_elements
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_array_type(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($element_type) ? null : $element_type->getData(), 
        $num_elements));
}

function gcc_jit_context_new_field(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_type_ptr $type,
    string $name
): gcc_jit_field_ptr {
    return new gcc_jit_field_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_field(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($type) ? null : $type->getData(), 
        $name));
}

function gcc_jit_field_as_object(
    ?gcc_jit_field_ptr $field
): gcc_jit_object_ptr {
    return new gcc_jit_object_ptr(__gcc_jit_getFFI()->gcc_jit_field_as_object(
        is_null($field) ? null : $field->getData()));
}

function gcc_jit_context_new_struct_type(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    string $name,
    int $num_fields,
    ?gcc_jit_field_ptr_ptr $fields
): gcc_jit_struct_ptr {
    return new gcc_jit_struct_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_struct_type(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $name, 
        $num_fields, 
        is_null($fields) ? null : $fields->getData()));
}

function gcc_jit_context_new_opaque_struct(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    string $name
): gcc_jit_struct_ptr {
    return new gcc_jit_struct_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_opaque_struct(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $name));
}

function gcc_jit_struct_as_type(
    ?gcc_jit_struct_ptr $struct_type
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_struct_as_type(
        is_null($struct_type) ? null : $struct_type->getData()));
}

function gcc_jit_struct_set_fields(
    ?gcc_jit_struct_ptr $struct_type,
    ?gcc_jit_location_ptr $loc,
    int $num_fields,
    ?gcc_jit_field_ptr_ptr $fields
): void {
    __gcc_jit_getFFI()->gcc_jit_struct_set_fields(
        is_null($struct_type) ? null : $struct_type->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $num_fields, 
        is_null($fields) ? null : $fields->getData());
}

function gcc_jit_context_new_union_type(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    string $name,
    int $num_fields,
    ?gcc_jit_field_ptr_ptr $fields
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_union_type(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $name, 
        $num_fields, 
        is_null($fields) ? null : $fields->getData()));
}

function gcc_jit_context_new_function_ptr_type(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_type_ptr $return_type,
    int $num_params,
    ?gcc_jit_type_ptr_ptr $param_types,
    int $is_variadic
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_function_ptr_type(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($return_type) ? null : $return_type->getData(), 
        $num_params, 
        is_null($param_types) ? null : $param_types->getData(), 
        $is_variadic));
}

function gcc_jit_context_new_param(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_type_ptr $type,
    string $name
): gcc_jit_param_ptr {
    return new gcc_jit_param_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_param(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($type) ? null : $type->getData(), 
        $name));
}

function gcc_jit_param_as_object(
    ?gcc_jit_param_ptr $param
): gcc_jit_object_ptr {
    return new gcc_jit_object_ptr(__gcc_jit_getFFI()->gcc_jit_param_as_object(
        is_null($param) ? null : $param->getData()));
}

function gcc_jit_param_as_lvalue(
    ?gcc_jit_param_ptr $param
): gcc_jit_lvalue_ptr {
    return new gcc_jit_lvalue_ptr(__gcc_jit_getFFI()->gcc_jit_param_as_lvalue(
        is_null($param) ? null : $param->getData()));
}

function gcc_jit_param_as_rvalue(
    ?gcc_jit_param_ptr $param
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_param_as_rvalue(
        is_null($param) ? null : $param->getData()));
}

function gcc_jit_context_new_function(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    int $kind,
    ?gcc_jit_type_ptr $return_type,
    string $name,
    int $num_params,
    ?gcc_jit_param_ptr_ptr $params,
    int $is_variadic
): gcc_jit_function_ptr {
    return new gcc_jit_function_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_function(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $kind, 
        is_null($return_type) ? null : $return_type->getData(), 
        $name, 
        $num_params, 
        is_null($params) ? null : $params->getData(), 
        $is_variadic));
}

function gcc_jit_context_get_builtin_function(
    ?gcc_jit_context_ptr $ctxt,
    string $name
): gcc_jit_function_ptr {
    return new gcc_jit_function_ptr(__gcc_jit_getFFI()->gcc_jit_context_get_builtin_function(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $name));
}

function gcc_jit_function_as_object(
    ?gcc_jit_function_ptr $func
): gcc_jit_object_ptr {
    return new gcc_jit_object_ptr(__gcc_jit_getFFI()->gcc_jit_function_as_object(
        is_null($func) ? null : $func->getData()));
}

function gcc_jit_function_get_param(
    ?gcc_jit_function_ptr $func,
    int $index
): gcc_jit_param_ptr {
    return new gcc_jit_param_ptr(__gcc_jit_getFFI()->gcc_jit_function_get_param(
        is_null($func) ? null : $func->getData(), 
        $index));
}

function gcc_jit_function_dump_to_dot(
    ?gcc_jit_function_ptr $func,
    string $path
): void {
    __gcc_jit_getFFI()->gcc_jit_function_dump_to_dot(
        is_null($func) ? null : $func->getData(), 
        $path);
}

function gcc_jit_function_new_block(
    ?gcc_jit_function_ptr $func,
    string $name
): gcc_jit_block_ptr {
    return new gcc_jit_block_ptr(__gcc_jit_getFFI()->gcc_jit_function_new_block(
        is_null($func) ? null : $func->getData(), 
        $name));
}

function gcc_jit_block_as_object(
    ?gcc_jit_block_ptr $block
): gcc_jit_object_ptr {
    return new gcc_jit_object_ptr(__gcc_jit_getFFI()->gcc_jit_block_as_object(
        is_null($block) ? null : $block->getData()));
}

function gcc_jit_block_get_function(
    ?gcc_jit_block_ptr $block
): gcc_jit_function_ptr {
    return new gcc_jit_function_ptr(__gcc_jit_getFFI()->gcc_jit_block_get_function(
        is_null($block) ? null : $block->getData()));
}

function gcc_jit_context_new_global(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    int $kind,
    ?gcc_jit_type_ptr $type,
    string $name
): gcc_jit_lvalue_ptr {
    return new gcc_jit_lvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_global(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $kind, 
        is_null($type) ? null : $type->getData(), 
        $name));
}

function gcc_jit_lvalue_as_object(
    ?gcc_jit_lvalue_ptr $lvalue
): gcc_jit_object_ptr {
    return new gcc_jit_object_ptr(__gcc_jit_getFFI()->gcc_jit_lvalue_as_object(
        is_null($lvalue) ? null : $lvalue->getData()));
}

function gcc_jit_lvalue_as_rvalue(
    ?gcc_jit_lvalue_ptr $lvalue
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_lvalue_as_rvalue(
        is_null($lvalue) ? null : $lvalue->getData()));
}

function gcc_jit_rvalue_as_object(
    ?gcc_jit_rvalue_ptr $rvalue
): gcc_jit_object_ptr {
    return new gcc_jit_object_ptr(__gcc_jit_getFFI()->gcc_jit_rvalue_as_object(
        is_null($rvalue) ? null : $rvalue->getData()));
}

function gcc_jit_rvalue_get_type(
    ?gcc_jit_rvalue_ptr $rvalue
): gcc_jit_type_ptr {
    return new gcc_jit_type_ptr(__gcc_jit_getFFI()->gcc_jit_rvalue_get_type(
        is_null($rvalue) ? null : $rvalue->getData()));
}

function gcc_jit_context_new_rvalue_from_int(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_type_ptr $numeric_type,
    int $value
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_rvalue_from_int(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($numeric_type) ? null : $numeric_type->getData(), 
        $value));
}

function gcc_jit_context_new_rvalue_from_long(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_type_ptr $numeric_type,
    int $value
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_rvalue_from_long(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($numeric_type) ? null : $numeric_type->getData(), 
        $value));
}

function gcc_jit_context_zero(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_type_ptr $numeric_type
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_zero(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($numeric_type) ? null : $numeric_type->getData()));
}

function gcc_jit_context_one(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_type_ptr $numeric_type
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_one(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($numeric_type) ? null : $numeric_type->getData()));
}

function gcc_jit_context_new_rvalue_from_double(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_type_ptr $numeric_type,
    float $value
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_rvalue_from_double(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($numeric_type) ? null : $numeric_type->getData(), 
        $value));
}

function gcc_jit_context_new_rvalue_from_ptr(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_type_ptr $pointer_type,
    ?void_ptr $value
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_rvalue_from_ptr(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($pointer_type) ? null : $pointer_type->getData(), 
        is_null($value) ? null : $value->getData()));
}

function gcc_jit_context_null(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_type_ptr $pointer_type
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_null(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($pointer_type) ? null : $pointer_type->getData()));
}

function gcc_jit_context_new_string_literal(
    ?gcc_jit_context_ptr $ctxt,
    string $value
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_string_literal(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $value));
}

function gcc_jit_context_new_unary_op(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    int $op,
    ?gcc_jit_type_ptr $result_type,
    ?gcc_jit_rvalue_ptr $rvalue
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_unary_op(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $op, 
        is_null($result_type) ? null : $result_type->getData(), 
        is_null($rvalue) ? null : $rvalue->getData()));
}

function gcc_jit_context_new_binary_op(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    int $op,
    ?gcc_jit_type_ptr $result_type,
    ?gcc_jit_rvalue_ptr $a,
    ?gcc_jit_rvalue_ptr $b
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_binary_op(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $op, 
        is_null($result_type) ? null : $result_type->getData(), 
        is_null($a) ? null : $a->getData(), 
        is_null($b) ? null : $b->getData()));
}

function gcc_jit_context_new_comparison(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    int $op,
    ?gcc_jit_rvalue_ptr $a,
    ?gcc_jit_rvalue_ptr $b
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_comparison(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $op, 
        is_null($a) ? null : $a->getData(), 
        is_null($b) ? null : $b->getData()));
}

function gcc_jit_context_new_call(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_function_ptr $func,
    int $numargs,
    ?gcc_jit_rvalue_ptr_ptr $args
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_call(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($func) ? null : $func->getData(), 
        $numargs, 
        is_null($args) ? null : $args->getData()));
}

function gcc_jit_context_new_call_through_ptr(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_rvalue_ptr $fn_ptr,
    int $numargs,
    ?gcc_jit_rvalue_ptr_ptr $args
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_call_through_ptr(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($fn_ptr) ? null : $fn_ptr->getData(), 
        $numargs, 
        is_null($args) ? null : $args->getData()));
}

function gcc_jit_context_new_cast(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_rvalue_ptr $rvalue,
    ?gcc_jit_type_ptr $type
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_cast(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($rvalue) ? null : $rvalue->getData(), 
        is_null($type) ? null : $type->getData()));
}

function gcc_jit_context_new_array_access(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_rvalue_ptr $ptr,
    ?gcc_jit_rvalue_ptr $index
): gcc_jit_lvalue_ptr {
    return new gcc_jit_lvalue_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_array_access(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($ptr) ? null : $ptr->getData(), 
        is_null($index) ? null : $index->getData()));
}

function gcc_jit_lvalue_access_field(
    ?gcc_jit_lvalue_ptr $struct_or_union,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_field_ptr $field
): gcc_jit_lvalue_ptr {
    return new gcc_jit_lvalue_ptr(__gcc_jit_getFFI()->gcc_jit_lvalue_access_field(
        is_null($struct_or_union) ? null : $struct_or_union->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($field) ? null : $field->getData()));
}

function gcc_jit_rvalue_access_field(
    ?gcc_jit_rvalue_ptr $struct_or_union,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_field_ptr $field
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_rvalue_access_field(
        is_null($struct_or_union) ? null : $struct_or_union->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($field) ? null : $field->getData()));
}

function gcc_jit_rvalue_dereference_field(
    ?gcc_jit_rvalue_ptr $ptr,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_field_ptr $field
): gcc_jit_lvalue_ptr {
    return new gcc_jit_lvalue_ptr(__gcc_jit_getFFI()->gcc_jit_rvalue_dereference_field(
        is_null($ptr) ? null : $ptr->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($field) ? null : $field->getData()));
}

function gcc_jit_rvalue_dereference(
    ?gcc_jit_rvalue_ptr $rvalue,
    ?gcc_jit_location_ptr $loc
): gcc_jit_lvalue_ptr {
    return new gcc_jit_lvalue_ptr(__gcc_jit_getFFI()->gcc_jit_rvalue_dereference(
        is_null($rvalue) ? null : $rvalue->getData(), 
        is_null($loc) ? null : $loc->getData()));
}

function gcc_jit_lvalue_get_address(
    ?gcc_jit_lvalue_ptr $lvalue,
    ?gcc_jit_location_ptr $loc
): gcc_jit_rvalue_ptr {
    return new gcc_jit_rvalue_ptr(__gcc_jit_getFFI()->gcc_jit_lvalue_get_address(
        is_null($lvalue) ? null : $lvalue->getData(), 
        is_null($loc) ? null : $loc->getData()));
}

function gcc_jit_function_new_local(
    ?gcc_jit_function_ptr $func,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_type_ptr $type,
    string $name
): gcc_jit_lvalue_ptr {
    return new gcc_jit_lvalue_ptr(__gcc_jit_getFFI()->gcc_jit_function_new_local(
        is_null($func) ? null : $func->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($type) ? null : $type->getData(), 
        $name));
}

function gcc_jit_block_add_eval(
    ?gcc_jit_block_ptr $block,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_rvalue_ptr $rvalue
): void {
    __gcc_jit_getFFI()->gcc_jit_block_add_eval(
        is_null($block) ? null : $block->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($rvalue) ? null : $rvalue->getData());
}

function gcc_jit_block_add_assignment(
    ?gcc_jit_block_ptr $block,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_lvalue_ptr $lvalue,
    ?gcc_jit_rvalue_ptr $rvalue
): void {
    __gcc_jit_getFFI()->gcc_jit_block_add_assignment(
        is_null($block) ? null : $block->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($lvalue) ? null : $lvalue->getData(), 
        is_null($rvalue) ? null : $rvalue->getData());
}

function gcc_jit_block_add_assignment_op(
    ?gcc_jit_block_ptr $block,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_lvalue_ptr $lvalue,
    int $op,
    ?gcc_jit_rvalue_ptr $rvalue
): void {
    __gcc_jit_getFFI()->gcc_jit_block_add_assignment_op(
        is_null($block) ? null : $block->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($lvalue) ? null : $lvalue->getData(), 
        $op, 
        is_null($rvalue) ? null : $rvalue->getData());
}

function gcc_jit_block_add_comment(
    ?gcc_jit_block_ptr $block,
    ?gcc_jit_location_ptr $loc,
    string $text
): void {
    __gcc_jit_getFFI()->gcc_jit_block_add_comment(
        is_null($block) ? null : $block->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        $text);
}

function gcc_jit_block_end_with_conditional(
    ?gcc_jit_block_ptr $block,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_rvalue_ptr $boolval,
    ?gcc_jit_block_ptr $on_true,
    ?gcc_jit_block_ptr $on_false
): void {
    __gcc_jit_getFFI()->gcc_jit_block_end_with_conditional(
        is_null($block) ? null : $block->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($boolval) ? null : $boolval->getData(), 
        is_null($on_true) ? null : $on_true->getData(), 
        is_null($on_false) ? null : $on_false->getData());
}

function gcc_jit_block_end_with_jump(
    ?gcc_jit_block_ptr $block,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_block_ptr $target
): void {
    __gcc_jit_getFFI()->gcc_jit_block_end_with_jump(
        is_null($block) ? null : $block->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($target) ? null : $target->getData());
}

function gcc_jit_block_end_with_return(
    ?gcc_jit_block_ptr $block,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_rvalue_ptr $rvalue
): void {
    __gcc_jit_getFFI()->gcc_jit_block_end_with_return(
        is_null($block) ? null : $block->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($rvalue) ? null : $rvalue->getData());
}

function gcc_jit_block_end_with_void_return(
    ?gcc_jit_block_ptr $block,
    ?gcc_jit_location_ptr $loc
): void {
    __gcc_jit_getFFI()->gcc_jit_block_end_with_void_return(
        is_null($block) ? null : $block->getData(), 
        is_null($loc) ? null : $loc->getData());
}

function gcc_jit_context_new_case(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_rvalue_ptr $min_value,
    ?gcc_jit_rvalue_ptr $max_value,
    ?gcc_jit_block_ptr $dest_block
): gcc_jit_case_ptr {
    return new gcc_jit_case_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_case(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($min_value) ? null : $min_value->getData(), 
        is_null($max_value) ? null : $max_value->getData(), 
        is_null($dest_block) ? null : $dest_block->getData()));
}

function gcc_jit_case_as_object(
    ?gcc_jit_case_ptr $case_
): gcc_jit_object_ptr {
    return new gcc_jit_object_ptr(__gcc_jit_getFFI()->gcc_jit_case_as_object(
        is_null($case_) ? null : $case_->getData()));
}

function gcc_jit_block_end_with_switch(
    ?gcc_jit_block_ptr $block,
    ?gcc_jit_location_ptr $loc,
    ?gcc_jit_rvalue_ptr $expr,
    ?gcc_jit_block_ptr $default_block,
    int $num_cases,
    ?gcc_jit_case_ptr_ptr $cases
): void {
    __gcc_jit_getFFI()->gcc_jit_block_end_with_switch(
        is_null($block) ? null : $block->getData(), 
        is_null($loc) ? null : $loc->getData(), 
        is_null($expr) ? null : $expr->getData(), 
        is_null($default_block) ? null : $default_block->getData(), 
        $num_cases, 
        is_null($cases) ? null : $cases->getData());
}

function gcc_jit_context_new_child_context(
    ?gcc_jit_context_ptr $parent_ctxt
): gcc_jit_context_ptr {
    return new gcc_jit_context_ptr(__gcc_jit_getFFI()->gcc_jit_context_new_child_context(
        is_null($parent_ctxt) ? null : $parent_ctxt->getData()));
}

function gcc_jit_context_dump_reproducer_to_file(
    ?gcc_jit_context_ptr $ctxt,
    string $path
): void {
    __gcc_jit_getFFI()->gcc_jit_context_dump_reproducer_to_file(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $path);
}

function gcc_jit_context_enable_dump(
    ?gcc_jit_context_ptr $ctxt,
    string $dumpname,
    ?string_ptr $out_ptr
): void {
    __gcc_jit_getFFI()->gcc_jit_context_enable_dump(
        is_null($ctxt) ? null : $ctxt->getData(), 
        $dumpname, 
        is_null($out_ptr) ? null : $out_ptr->getData());
}

function gcc_jit_timer_new(
): gcc_jit_timer_ptr {
    return new gcc_jit_timer_ptr(__gcc_jit_getFFI()->gcc_jit_timer_new());
}

function gcc_jit_timer_release(
    ?gcc_jit_timer_ptr $timer
): void {
    __gcc_jit_getFFI()->gcc_jit_timer_release(
        is_null($timer) ? null : $timer->getData());
}

function gcc_jit_context_set_timer(
    ?gcc_jit_context_ptr $ctxt,
    ?gcc_jit_timer_ptr $timer
): void {
    __gcc_jit_getFFI()->gcc_jit_context_set_timer(
        is_null($ctxt) ? null : $ctxt->getData(), 
        is_null($timer) ? null : $timer->getData());
}

function gcc_jit_context_get_timer(
    ?gcc_jit_context_ptr $ctxt
): gcc_jit_timer_ptr {
    return new gcc_jit_timer_ptr(__gcc_jit_getFFI()->gcc_jit_context_get_timer(
        is_null($ctxt) ? null : $ctxt->getData()));
}

function gcc_jit_timer_push(
    ?gcc_jit_timer_ptr $timer,
    string $item_name
): void {
    __gcc_jit_getFFI()->gcc_jit_timer_push(
        is_null($timer) ? null : $timer->getData(), 
        $item_name);
}

function gcc_jit_timer_pop(
    ?gcc_jit_timer_ptr $timer,
    string $item_name
): void {
    __gcc_jit_getFFI()->gcc_jit_timer_pop(
        is_null($timer) ? null : $timer->getData(), 
        $item_name);
}

function gcc_jit_timer_print(
    ?gcc_jit_timer_ptr $timer,
    ?FILE_ptr $f_out
): void {
    __gcc_jit_getFFI()->gcc_jit_timer_print(
        is_null($timer) ? null : $timer->getData(), 
        is_null($f_out) ? null : $f_out->getData());
}
