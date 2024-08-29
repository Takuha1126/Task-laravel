<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
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
                    <a class="nav__create" href="{{ route('task.create')}}">作成</a>
                </div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="nav__button">ログアウト</button>
                </form>
            </nav>
        </div>
    </header>
    <main class="main">
        <div class="main__user">
            <p class="main__name">{{ $user->name }}様のタスク</p>
        </div>
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('message'))
            <div class="message">
                {{ session('message') }}
            </div>
        @endif
        <div class="main__ttl">
            <table class="table">
                <tr class="tr">
                    <th class="th">タイトル</th>
                    <th class="th">期限日</th>
                    <th class="th">詳細</th>
                    <th class="th">編集</th>
                    <th class="th">削除</th>
                </tr>
            @foreach($tasks as $task)
                <tr class="tr">
                    <td class="td">{{ $task->title }}</td>
                    <td class="td">{{ $task->date }}</td>
                    <td class="td">{{ $task->detail }}</td>
                    <td class="td">
                        <a href="{{ route('task.edit', $task->id) }}" class="td__edit">編集</a>
                    </td>
                    <td class="td">
                        <form action="{{ route('task.destroy', $task->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </main>
</body>
</html>