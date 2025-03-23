<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.brand.create');
    }
}
