<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('dynamicLinkSidebar')) {
    function dynamicLinkSidebar($routeName, $class): string
    {
        return Route::currentRouteName() == $routeName ? $class : '';
    }
}

if (!function_exists('IsActive')) {
    function IsActive($feild, $value, $action): string
    {
        return $feild == $value ? $action : '';
    }
}

if (!function_exists('getCategory')) {
    function getCategory()
    {
        $category = \App\Models\Category::select('name', 'description', 'slug')->withCount('post')->orderBy('id', 'DESC')->limit(5)->get();
        if (sizeof($category) > 0) {
            return $category;
        }
        return false;
    }
}
