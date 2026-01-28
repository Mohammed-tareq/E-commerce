<?php

namespace App\Http\Controllers\Website\DynamicPage;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function getPage($slug){
        $page = Page::active()->whereSlug($slug)->first();
        if (!$page) {
            abort(404);
        }
        return view('website.pages.dynamic-page', compact('page'));
    }
}
