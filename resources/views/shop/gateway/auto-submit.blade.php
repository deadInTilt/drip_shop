<form id="autoSubmitForm" method="POST" action="{{ route('shop.payment.callback') }}">
    @csrf
    <input type="hidden" name="order_id" value="{{ $orderId }}">
    <input type="hidden" name="status" value="{{ $status }}">
</form>

<script>
    document.getElementById('autoSubmitForm').submit();
</script>
