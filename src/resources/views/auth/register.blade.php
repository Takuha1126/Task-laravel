<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}" />
</head>
<body>
    <div class="register">
        <div class="register__ttl">
            <div class="register__title">
                <p class="register__item">Register</p>
            </div>
            <div class="register__about">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="register__group">
                        <label class="label">名前</label>
                        <input type="text" name="name" placeholder="テスト太郎">
                    </div>
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div class="register__group">
                        <label class="label">メールアドレス</label>
                        <input type="text" name="email" placeholder="text@icloud.com">
                    </div>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div class="register__group">
                        <label class="label">パスワード</label>
                        <input type="password" name="password" placeholder="text1234">
                    </div>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div class="button">
                        <button class="button__ttl">新規登録</button>
                    </div>
                </form>
                <a class="register__url" href="{{ route('login') }}">ログインへ</a>
            </div>
        </div>
    </div>
</body>
</html>