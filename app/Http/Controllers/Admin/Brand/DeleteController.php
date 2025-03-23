<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.brand.index');
    }
}
