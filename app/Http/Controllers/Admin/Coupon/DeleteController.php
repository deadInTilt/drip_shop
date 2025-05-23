<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('admin.coupon.index');
    }
}
