#アプリ名
task管理アプリ

#作成した目的
すぐに予定を把握できるため

#機能一覧
新規登録機能,ログイン機能,認証メール機能,タスク当日リマインダー送信機能,タスク一覧機能,タスク作成機能,タスク削除機能

#使用技術
Laravel,php

#開発環境構築
開発環境を以下のgithubURLからクローンする
git clone https://github.com/Takuha1126/Task-laravel.git

ここではTask-laravelでする
cd　Task-laravel

Dockerで開発環境の構築
docker-compose up -d --build

Laravelパッケージをインストール
docker-compose exec php bash

composer install

.envの作成
cp .env.example .env

.envを書き換える
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

キーを作成
php artisan key:generate

テーブルの作成
php artisan migrate:refresh

