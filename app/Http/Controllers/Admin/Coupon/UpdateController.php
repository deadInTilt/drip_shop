<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupon\UpdateRequest;
use App\Models\Coupon;
use Carbon\Carbon;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Coupon $coupon)
    {
        $data = $request->validated();
        $data['expires_at'] = Carbon::parse($data['expires_at'])->startOfDay()->toDateTimeString();
        $coupon->update($data);

        return view('admin.coupon.show', compact('coupon'));
    }
}
