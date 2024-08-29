<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}" />
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
    <main class="main">
        <div class="container">
            <p class="container__title">タスクの編集</p>
            <form action="{{ route('task.update', $task->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="container__item">
                    <div class="form-group">
                        <label for="title" class="label">タイトル</label>
                        <input type="text" id="title" name="title" value="{{ $task->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date" class="label">期限日</label>
                        <input type="date" id="date" name="date" value="{{ $task->date }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="detail" class="label">詳細</label>
                        <textarea id="detail" name="detail" class="form-control">{{ $task->detail }}</textarea>
                    </div>
                    <div class="button">
                        <button type="submit" class="edit__button">更新</button>
                        <a href="{{ route('task.index') }}" class="cancel__link">キャンセル</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>