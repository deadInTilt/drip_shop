<h1>Оплата заказа №{{ $orderId }}</h1>
<form method="POST" action="{{ route('shop.payment.process') }}">
    @csrf
    <input type="hidden" name="order_id" value="{{ $orderId }}">

    <button type="submit" name="simulate_success" value="1">Оплатить успешно</button>
    <button type="submit" name="simulate_cancel" value="2">Отменить оплату</button>
</form>
