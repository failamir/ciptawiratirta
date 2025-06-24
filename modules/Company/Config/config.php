<?php

return [
    'companies_route_prefix' => env("COMPANIES_ROUTER_PREFIX","companies"),
    'companies_category_route_prefix'=> env("COMPANIES_CATEGORY_ROUTER_PREFIX",'category'),
    'list_layouts' => [
        'company-list-v1' => "V1",
        'company-list-v2' => "V2",
        'company-list-v3' => "V3",
        'company-list-v4' => "V4",
    ],
    'detail_layouts' => [
        'company-single-v1' => "V1 (default)",
        'company-single-v2' => "V2",
        'company-single-v3' => "V3",
    ],
    "has_cover"=>false,
    "has_gallery"=>false
];
