<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupon\StoreRequest;
use App\Models\Coupon;
use Carbon\Carbon;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['expires_at'] = Carbon::parse($data['expires_at'])->startOfDay()->toDateTimeString();
        Coupon::firstOrCreate($data);

        return redirect()->route('admin.coupon.index');
    }
}
