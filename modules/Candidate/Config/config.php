<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 7/3/2019
 * Time: 9:32 PM
 */
return [
    'candidate_route_prefix' => env("CANDIDATE_ROUTER_PREFIX","candidate"),
    'candidate_category_route_prefix' => env("CANDIDATE_CATEGORY_ROUTER_PREFIX","category"),
    'list_layouts' => [
        'v1' => "Version 1",
        'v2' => "Version 2",
        'v3' => "Version 3",
        'v4' => "Version 4",
        'v5' => "Version 5",
    ],
    'detail_layouts' => [
        'v1' => "Version 1",
        'v2' => "Version 2",
    ],
    'for_map_layouts' => [
        'v4',
        'v5'
    ]
];
