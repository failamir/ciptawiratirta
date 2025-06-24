<?php
return [
    'active_theme'=>isset($_GET['_xtheme']) ? $_GET['_xtheme'] :env('BC_ACTIVE_THEME',defined('BC_INIT_THEME') ? BC_INIT_THEME : 'Base'),
    "media"=>[
        "groups"=>[
            "default"=>[
                "ext"=>["jpg",'jpeg','png','gif','bmp', 'ico', 'JPG'],
                "mime"=>["image/png","image/jpeg","image/gif","image/bmp", 'image/x-icon'],
                "max_size"=>20000000, // In Bytes, default is 20MB,
                "max_width"=>4032,// Only for Image
                "max_height"=>4032,// Only for Image
            ],
            "image"=>[
                "ext"=>["jpg",'jpeg','png','gif','bmp', 'ico', 'JPG'],
                "mime"=>["image/png","image/jpeg","image/gif","image/bmp", 'image/x-icon'],
                "max_size"=>20000000, // In Bytes, default is 20MB,
                "max_width"=>4032,// Only for Image
                "max_height"=>4032,// Only for Image
            ],
            'cvs'=>[
                "ext"=>['ppt','pptx','pdf','docx','doc'],
                "mime"=>["application/vnd.ms-powerpoint","application/vnd.openxmlformats-officedocument.presentationml.presentation","application/pdf","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/msword"],
                "max_size" => 50000000,
            ],
            'scorm' => [
                "ext"=>['zip','rar', 'gzip'],
                "mime"=> ['application/x-gzip', 'application/zip', 'application/x-rar-compressed'],
                "max_size" => 200000000 // In Bytes, default is 200MB,
            ],
            'order_attachment' => [
                "ext"=>["jpg",'jpeg','png','gif','bmp','zip','rar', 'gzip'],
                "mime"=>["image/png","image/jpeg","image/gif","image/bmp",'application/x-gzip', 'application/zip', 'application/x-rar-compressed'],
                "max_size"=>200000000,
                "max_width"=>4032,
                "max_height"=>4032,
            ]
        ],
        "optimize_image"=>env('BC_MEDIA_OPTIMIZE_IMAGE',true),
        "preview_direct"=>env("BC_MEDIA_PREVIEW_DIRECT",true)
    ],
    'disable_require_change_pw'=>env('DISABLE_REQUIRE_CHANGE_PW',0),
];
