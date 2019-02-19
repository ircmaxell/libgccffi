<?php
declare(strict_types=1);


function getFFI(): \FFIMe\FFIMe {
    static $ffi = null;
    if (!$ffi) {
        $ffi = (new \FFIMe\FFIMe('/usr/lib/x86_64-linux-gnu/libgccjit.so.0'))
          ->include('/usr/lib/gcc/x86_64-linux-gnu/6/include/libgccjit.h')
          ->build();
    }
    return $ffi;
}

require __DIR__ . '/test.php';

// function getNullPointer(): \FFI\CData {
//     static $null = null;
//     if (is_null($null)) {
//         $ffi = getFFI();
//         $null = $ffi->new($ffi->type('void*')); 
//     }
//     return $null;
// }

// function gcc_jit_context_set_int_option(
//     gcc_jit_context_ptr $ctxt,
//     int $opt,
//     int $value
// ): void {
//     getFFI()->gcc_jit_context_set_int_option(
//         $ctxt->getData(),
//         $opt,
//         $value
//     );
// }

// function gcc_jit_context_set_bool_option(
//     gcc_jit_context_ptr $ctxt,
//     int $opt,
//     int $value
// ): void {
//     getFFI()->gcc_jit_context_set_bool_option(
//         $ctxt->getData(),
//         $opt,
//         $value
//     );
// }

// function gcc_jit_context_compile_to_file(
//     gcc_jit_context_ptr $ctxt,
//     int $output_kind,
//     string $output_path
// ): void {
//     getFFI()->gcc_jit_context_compile_to_file(
//         $ctxt->getData(),
//         $output_kind,
//         $output_path
//     );
// }

// function gcc_jit_context_new_function(
//     gcc_jit_context_ptr $ctxt,
//     ?gcc_jit_location_ptr $loc,
//     int $kind,
//     gcc_jit_type_ptr $return_type,
//     string $name,
//     int $num_params,
//     gcc_jit_param_ptr_ptr $params,
//     int $is_variadic
// ): gcc_jit_function_ptr {
//     return new gcc_jit_function_ptr(
//         getFFI()->gcc_jit_context_new_function(
//             $ctxt->getData(),
//             is_null($loc) ? $loc : $loc->getData(),
//             $kind,
//             $return_type->getData(),
//             $name,
//             $num_params,
//             $params->getData(),
//             $is_variadic
//         )
//     );
// }

// function gcc_jit_block_add_eval(
//     gcc_jit_block_ptr $block,
//     ?gcc_jit_location $loc,
//     gcc_jit_rvalue_ptr $rvalue
// ): void {
//     getFFI()->gcc_jit_block_add_eval(
//         $block->getData(),
//         is_null($loc) ? null : $loc->getData(),
//         $rvalue->getData()
//     );
// }

// function gcc_jit_context_compile(gcc_jit_context_ptr $ctxt): gcc_jit_result_ptr {
//     return new gcc_jit_result_ptr(
//         getFFI()->gcc_jit_context_compile($ctxt->getData())
//     );
// }

// function gcc_jit_result_get_code(gcc_jit_result_ptr $result, string $name): void_ptr {
//     return new void_ptr(
//         getFFI()->gcc_jit_result_get_code(
//             $result->getData(),
//             $name
//         )
//     );
// }

// function gcc_jit_block_end_with_void_return(
//     gcc_jit_block_ptr $block,
//     ?gcc_jit_location_ptr $loc
// ): void {
//     getFFI()->gcc_jit_block_end_with_void_return(
//         $block->getData(),
//         is_null($loc) ? null : $loc->getData()
//     );
// }

// function gcc_jit_context_release(
//     gcc_jit_context_ptr $ctxt
// ): void {
//     getFFI()->gcc_jit_context_release(
//         $ctxt->getData()
//     );
// }

// function gcc_jit_context_new_call(
//     gcc_jit_context_ptr $ctxt,
//     ?gcc_jit_location_ptr $loc,
//     gcc_jit_function_ptr $func,
//     int $numargs, 
//     gcc_jit_rvalue_ptr_ptr $args
// ): gcc_jit_rvalue_ptr {
//     return new gcc_jit_rvalue_ptr(
//         getFFI()->gcc_jit_context_new_call(
//             $ctxt->getData(),
//             is_null($loc) ? null : $loc->getData(),
//             $func->getData(),
//             $numargs,
//             $args->getData()
//         )
//     );
// }

// function gcc_jit_function_new_block(gcc_jit_function_ptr $func, string $name): gcc_jit_block_ptr {
//     return new gcc_jit_block_ptr(
//         getFFI()->gcc_jit_function_new_block(
//             $func->getData(), 
//             $name
//         )
//     );
// }

// function gcc_jit_context_new_string_literal(gcc_jit_context_ptr $ctxt, string $value): gcc_jit_rvalue_ptr {
//     return new gcc_jit_rvalue_ptr(
//         getFFI()->gcc_jit_context_new_string_literal(
//             $ctxt->getData(), 
//             $value
//         )
//     );
// }

// function gcc_jit_param_as_rvalue(gcc_jit_param_ptr $param): gcc_jit_rvalue_ptr {
//     return new gcc_jit_rvalue_ptr(
//         getFFI()->gcc_jit_param_as_rvalue(
//             $param->getData()
//         )
//     );
// }

// function gcc_jit_context_acquire(): gcc_jit_context_ptr {
//     return new gcc_jit_context_ptr(getFFI()->gcc_jit_context_acquire());
// }

// function gcc_jit_context_get_type(gcc_jit_context_ptr $ctxt, int $type): gcc_jit_type_ptr {
//     return new gcc_jit_type_ptr(
//         getFFI()->gcc_jit_context_get_type(
//             $ctxt->getData(),
//             $type
//         )
//     );
// }

// function gcc_jit_context_new_param(
//     gcc_jit_context_ptr $ctxt,
//     ?gcc_jit_location_ptr $loc,
//     gcc_jit_type_ptr $type,
//     string $name
// ): gcc_jit_param_ptr {
//     return new gcc_jit_param_ptr(
//         getFFI()->gcc_jit_context_new_param(
//             $ctxt->getData(),
//             is_null($loc) ? $loc : $loc->getData(),
//             $type->getData(),
//             $name
//         )
//     );
// }