<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class IndexController extends Controller
{
    public function __invoke()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }
}
