<!DOCTYPE html>
<html>
<head><title>Мои заявки</title></head>
<body>
<h2>Ваши заявки</h2>
@if($orders->isEmpty())
    <p>Заявок пока нет.</p>
@else
    @foreach($orders as $order)
        <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
            <strong>{{ $order->course_name }}</strong><br>
            Дата: {{ $order->desired_start_date }}<br>
            Оплата: {{ $order->payment_method == 'cash' ? 'Наличные' : 'Перевод' }}
            @if($order->phone)
                (телефон: {{ $order->phone }})
            @endif<br>
            Статус: {{ $order->status }}
        </div>
    @endforeach
@endif
<a href="/orders/create">Подать новую заявку</a>
</body>
</html>
