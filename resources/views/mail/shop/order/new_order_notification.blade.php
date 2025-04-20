<h1>Новый заказ №{{ $order->id }}</h1>
<p>Клиент: {{ $order->user->id }}</p>
<p>Email: {{ $order->user->email }}</p>
<p>Сумма: {{ $order->total }}</p>
