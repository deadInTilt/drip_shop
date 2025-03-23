<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Brand::firstOrCreate($data);

        return redirect()->route('admin.brand.index');
    }
}
