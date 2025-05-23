<?php

namespace App\Http\Controllers\Shop\Address;

use App\Exceptions\Shop\Address\AddressException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Address\AddressRequest;
use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function store(AddressRequest $request): RedirectResponse
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
            throw new AddressException('Ошибка при создании адреса.', 0, $e);
        }
    }

    public function updateMainAddress(Request $request): RedirectResponse
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
            throw new AddressException('Ошибка при выборе основного адреса.', 0, $e);
        }
    }
}
