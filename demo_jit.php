<?php

declare(strict_types=1);

require __DIR__ . "/vendor/autoload.php";

// This demo is based on https://gcc.gnu.org/onlinedocs/jit/intro/tutorial01.html

$ctxt = gcc_jit_context_acquire();
gcc_jit_context_set_int_option($ctxt, GCC_JIT_INT_OPTION_OPTIMIZATION_LEVEL, 3);
gcc_jit_context_set_bool_option($ctxt, GCC_JIT_BOOL_OPTION_DEBUGINFO, 0);
$void_type = gcc_jit_context_get_type($ctxt, GCC_JIT_TYPE_VOID);
$const_char_ptr_type = gcc_jit_context_get_type($ctxt, GCC_JIT_TYPE_CONST_CHAR_PTR);

$param_name = gcc_jit_context_new_param($ctxt, null, $const_char_ptr_type, "name");

$func = gcc_jit_context_new_function(
    $ctxt, 
    NULL,
    GCC_JIT_FUNCTION_EXPORTED,
    $void_type,
    "some_func",
    1, 
    gcc_jit_param_ptr_ptr::fromArray($param_name),
    0
);

$param_format = gcc_jit_context_new_param ($ctxt, null, $const_char_ptr_type, "format");
$printf_func = gcc_jit_context_new_function(
    $ctxt, 
    NULL,
    GCC_JIT_FUNCTION_IMPORTED,
    gcc_jit_context_get_type ($ctxt, GCC_JIT_TYPE_INT),
    "printf",
    1, 
    gcc_jit_param_ptr_ptr::fromArray($param_format),
1);
$args = gcc_jit_rvalue_ptr_ptr::fromArray(
    gcc_jit_context_new_string_literal($ctxt, "Hello %s\n\0"),
    gcc_jit_param_as_rvalue($param_name)
);

$block = gcc_jit_function_new_block($func, "initial");

gcc_jit_block_add_eval(
    $block,
    null,
    gcc_jit_context_new_call(
        $ctxt,
        null,
        $printf_func,
        2,
        $args
    )
);

gcc_jit_block_end_with_void_return($block, NULL);

$result = gcc_jit_context_compile($ctxt);
$void = gcc_jit_result_get_code($result, 'some_func');
$cb = __gcc_jit_getCallable('void(*)(char*)', $void);

$cb("World");

echo "done\n";