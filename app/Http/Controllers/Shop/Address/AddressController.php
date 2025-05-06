<?php

namespace App\Http\Controllers\Shop\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Address\AddressRequest;
use App\Http\Requests\Shop\Cart\CartRequest;
use App\Models\Address;
use App\Services\Shop\Cart\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function getAddresses(Request $request)
    {
        $addresses = $request->user()->addresses();
        $mainAddress = $addresses->where('is_main', 1)->first();
    }

    public function store(AddressRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        try {
            $currentMainAddress = Address::where('user_id', $request->user()->id,)
                ->where('is_main', 1);
            $currentMainAddress->update(['is_main' => 0]);
            Address::create($data);

            return redirect()->back();
        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function updateMainAddress(Request $request)
    {
        $address = Address::findOrFail($request['address_id']);

        try {
            DB::beginTransaction();
                $currentMainAddress = Address::where('user_id', $request->user()->id,)
                                      ->where('is_main', 1);
                $currentMainAddress->update(['is_main' => 0]);

                $address->update(['is_main' => 1]);
                $address->save();
            DB::commit();

            return redirect()->back();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
}
