<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }
}
