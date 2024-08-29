<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="header__item">
            <div class="header__ttl">
                <i class="fas fa-feather-alt icon-white"></i>
                <p class="header__title">yfui</p>
                <i class="fas fa-feather-alt icon-white"></i>
            </div>
        </div>
    </header>
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
                <div class="link">
                    <a class="register__url" href="{{ route('register') }}">新規登録へ</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>