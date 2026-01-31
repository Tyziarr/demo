<!DOCTYPE html>
<html>
<head><title>Форма заявки</title></head>
<body>
<h2>Оформить заявку</h2>

<form method="POST" action="{{ route('orders.store') }}">
    @csrf

    <label>Курс:</label><br>
    <input name="course_name" value="{{ old('course_name') }}" required><br>
    @error('course_name')<small>{{ $message }}</small><br>@enderror

    <label>Желаемая дата начала:</label><br>
    <input type="date" name="desired_start_date" value="{{ old('desired_start_date') }}" required><br>
    @error('desired_start_date')<small>{{ $message }}</small><br>@enderror

    <label>Способ оплаты:</label><br>
    <label><input type="radio" name="payment_method" value="cash" {{ old('payment_method', 'cash') == 'cash' ? 'checked' : '' }}> Наличные</label><br>
    <label><input type="radio" name="payment_method" value="transfer" {{ old('payment_method') == 'transfer' ? 'checked' : '' }}> Перевод по телефону</label><br>
    @error('payment_method')<small>{{ $message }}</small><br>@enderror

    <div id="phone-field" style="display: {{ old('payment_method') == 'transfer' ? 'block' : 'none' }}">
        <label>Номер телефона (для перевода):</label><br>
        <input name="phone" placeholder="+79991234567 value="{{ old('phone') }}" pattern="\+?[0-9]{10,15}">
        @error('phone')<small>{{ $message }}</small><br>@enderror
    </div>

    <script>
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', () => {
                const phoneDiv = document.getElementById('phone-field');
                phoneDiv.style.display = radio.value === 'transfer' ? 'block' : 'none';
            });
        });
    </script>

    <button type="submit">Отправить</button>
</form>

<a href="/orders">Мои заявки</a>
</body>
</html>
