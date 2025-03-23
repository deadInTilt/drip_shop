<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\UpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Brand $brand)
    {
        $data = $request->validated();
        $brand->update($data);

        return view('admin.brand.show', compact('brand'));
    }
}
