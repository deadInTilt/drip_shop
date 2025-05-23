<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Coupon $coupon)
    {
        return view('admin.coupon.show', compact('coupon'));
    }
}
