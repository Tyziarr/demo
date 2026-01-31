<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Вход</title>
    <style>
        body { font-family: sans-serif; background: #f5f7fa; }
        .container { max-width: 400px; margin: 60px auto; padding: 20px; background: white; border-radius: 8px; }
        .error { color: red; font-size: 0.875rem; margin: 4px 0; }
        input { width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #b1afaf; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #39168c; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <form method="POST" action="/login">
        @csrf
        <input name="login" placeholder="Логин" value="{{ old('login') }}">
        @error('login')<div class="error">{{ $message }}</div>@enderror

        <input name="password" type="password" placeholder="Пароль">
        @error('password')<div class="error">{{ $message }}</div>@enderror

        <button type="submit">Войти</button>
        <p>Еще не зарегистрированы? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
    </form>
</div>
</body>
</html>
