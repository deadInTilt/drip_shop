<?php

namespace App\Http\Controllers\Shop\Order;

use App\Exceptions\Shop\Order\EmptyCartException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Order\OrderRequest;
use App\Services\Shop\Order\OrderService;

class StoreController extends Controller
{
    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function __invoke(OrderRequest $request)
    {
        $order = $this->service->create($request);

        try {
            return redirect()->route('shop.catalog.index');
        } catch (EmptyCartException $e) {
            return back()->withErrors(['cart' => $e->getMessage()]);
        } catch (\Exception $e) {
            return back()->withErrors(['order' => 'Что-то пошло не так...']);
        }
    }
}
