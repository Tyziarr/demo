<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <style>
        body { font-family: sans-serif; background: #f5f7fa; }
        .container { max-width: 400px; margin: 40px auto; padding: 20px; background: white; border-radius: 8px; }
        .error { color: red; font-size: 0.875rem; margin-top: 4px; }
        input { width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #39168c; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <form method="POST" action="/register">
        @csrf
        <input name="name" placeholder="Имя" value="{{ old('name') }}">
        @error('name')<div class="error">{{ $message }}</div>@enderror

        <input name="surname" placeholder="Фамилия" value="{{ old('surname') }}">
        @error('surname')<div class="error">{{ $message }}</div>@enderror

        <input name="patronymic" placeholder="Отчество" value="{{ old('patronymic') }}">
        @error('patronymic')<div class="error">{{ $message }}</div>@enderror

        <input name="login" placeholder="Логин" value="{{ old('login') }}">
        @error('login')<div class="error">{{ $message }}</div>@enderror

        <input name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')<div class="error">{{ $message }}</div>@enderror

        <input name="password" type="password" placeholder="Пароль">
        @error('password')<div class="error">{{ $message }}</div>@enderror

        <button type="submit">Создать пользователя</button>
        <p>Уже зарегистрированы? <a href="{{ route('login') }}">Авторизоваться</a></p>
    </form>
</div>
</body>
</html>
