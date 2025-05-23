<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;

class IndexController extends Controller
{
    public function __invoke()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
    }
}
