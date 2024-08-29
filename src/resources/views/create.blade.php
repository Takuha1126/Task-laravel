<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/create.css') }}" />
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
            <nav class="nav">
                <div class="nav__ttl">
                    <a class="nav__create" href="{{ route('task.index')}}">一覧</a>
                </div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="nav__button">ログアウト</button>
                </form>
            </nav>
        </div>
    </header>
    <main class="main">
        <div class="main__ttl">
            <p class="main__title">タスクを入力してください</p>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <form action="{{route('task.store') }}" method="post">
            @csrf
        <div class="main__item">
            <div class="item__about">
                <label class="label">タイトル</label>
                <input type="text" name="title" placeholder="タイトル">
            </div>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
            <div class="item__about">
                <label class="label">日付</label>
                <input type="date" name="date" id="date-input">
            </div>
            @error('date')
                <div class="error">{{ $message}}</div>
            @enderror
            <div class="item__about">
                <label class="label">詳細</label>
                <textarea  name="detail" placeholder="詳細"></textarea>
            </div>
            @error('detail')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="button">
            <button class="button__ttl">作成</button>
        </div>
        </form>
    </main>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var dateInput = document.getElementById('date-input');
        var today = new Date();
        var day = String(today.getDate()).padStart(2, '0');
        var month = String(today.getMonth() + 1).padStart(2, '0');
        var year = today.getFullYear();
        var todayFormatted = year + '-' + month + '-' + day;
        dateInput.value = todayFormatted;
    });
    </script>
</body>
</html>