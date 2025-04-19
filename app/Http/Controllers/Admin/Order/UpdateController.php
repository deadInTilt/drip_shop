<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Models\Order;
use App\Services\Logger\LoggerInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(UpdateRequest $request, Order $order)
    {
        try {
            $data = $request->validated();
            $order->update($data);

            $this->logger->info('Заказ {id} обновлен', ['id' => $request->order()->id]);

            return view('admin.order.show', compact('order'));

        }
        catch (QueryException $queryException) {
            return back()->withErrors('Ошибка базы данных: ' . $queryException->getMessage());
        }
        catch (\Exception $exception) {
            return back()->withErrors('Произошла ошибка при обновлении заказа: ' . $exception->getMessage());
        }
    }
}
