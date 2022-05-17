<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    'validate' => [
        'id'=>"Id không được để trống",
        'username_require'=>"Tên nhân viên không được để trống",
        'username_min'=>"Tên nhân viên nhỏ nhất 6 kí tự",

        "em_code_require"=>"Mã nhân viên không được để trống",
        "em_code_min"=>"Mã nhân viên nhỏ nhất 6 kí tự",
    ],
    'create'=>[
        'success'=>"Tạo nhân viên thành công",
        'fail'=>"Tạo nhân viên thất bại",
    ],
    'update'=>[
        'success'=>"Cập nhât nhân viên thành công",
        'fail'=>"Cập nhât nhân viên thất bại",
    ]
];
