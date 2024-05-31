<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}" />
</head>
<body>
    <div class="login">
        <div class="login__ttl">
            <div class="login__title">
                <p class="login__item">Login</p>
            </div>
            <div class="login__about">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="login__group">
                        <label class="label">メールアドレス</label>
                        <input type="text" name="email" placeholder="text@icloud.com">
                    </div>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div class="login__group">
                        <label class="label">パスワード</label>
                        <input type="password" name="password" placeholder="text1234">
                    </div>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div class="button">
                        <button class="button__ttl">ログイン</button>
                    </div>
                </form>
                <a class="register__url" href="{{ route('register') }}">新規登録へ</a>
            </div>
        </div>
    </div>
</body>
</html>