

# libgccjit

This is a wrapper library for libgccjit using 7.4's FFI.

Basically, it exposes a "nice" interface in PHP for building JITs with GCC.

Example (in C, from https://gcc.gnu.org/wiki/JIT):

```c
gcc_jit_type *void_type = gcc_jit_context_get_type (ctxt, GCC_JIT_TYPE_VOID);
gcc_jit_type *const_char_ptr_type = gcc_jit_context_get_type (ctxt, GCC_JIT_TYPE_CONST_CHAR_PTR);
gcc_jit_param *param_name =
  gcc_jit_context_new_param (ctxt, NULL, const_char_ptr_type, "name");
gcc_jit_function *func =
  gcc_jit_context_new_function (ctxt, NULL,
                                GCC_JIT_FUNCTION_EXPORTED,
                                void_type,
                                "some_fn",
                                1, &param_name,
                                0);
```

Would become:

```php
$void_type = gcc_jit_context_get_type($ctxt, GCC_JIT_TYPE_VOID);
$const_char_ptr_type = gcc_jit_context_get_type($ctxt, GCC_JIT_TYPE_CONST_CHAR_PTR);
$param_name = gcc_jit_context_new_param($ctxt, null, $const_char_ptr_type, "name");
$func = gcc_jit_context_new_function(
    $ctxt, 
    null,
    GCC_JIT_FUNCTION_EXPORTED,
    $void_type,
    "some_fn",
    1,
    gcc_jit_param_ptr_ptr::fromArray($param_name),
    0
);
```

It aims to be a simple, and type safe implementation in PHP.