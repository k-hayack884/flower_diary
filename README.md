![flower_diary](https://github.com/k-hayack884/flower_diary/assets/85856269/bbbe94b0-d376-419a-bcc7-61d95a8d18dc)


<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## flower-diary

### URL:
https://flower-diary.herokuapp.com/
### プレビュー  
![flower_diary](https://github.com/k-hayack884/flower_diary/assets/85856269/71e1b8d0-08fc-497d-9835-14cc916c9cd9)

### 概要：  
道端などで見つけた名もない植物を判別し、その情報から水やりなどの世話を管理するサービスです。また、日記をつけることもできるので、日々の成長を振り返ることもできます。
レスポンシブ対応をしているため、スマートフォンからもご利用できます。  
### 制作の背景：  
外でフィールドワークをしていると、とても素敵な植物と出会うことが、よくあります。
しかし、その植物を調べようとするための植物図鑑はとても重いうえ、面倒だと思いました。
そこで、スマートフォン一本で植物の判定や、お世話方法、思い出作りの日記など、植物の世話をDX化したいと思いこのサービスを作成しました。
前職の経験から得た、多少のDDDの知識を活用し、水やりと肥料やりをモデリングしました。
私はこのサービスを通して、より多くの植物と出会うきっかけになればと思います。 
### 機能:  
 -植物を判別する機能
 - 判別した植物を自身のアカウントに紐づけて管理する機能（myプラント）
 - myプラントごとに日記をつける機能
 - 水やりや肥料の間隔や量を設定する機能
 - 設定した水やりや肥料に基づいて、今日のお世話を表示する機能
 - 画像登録機能(AWS:s3)
 - 自動メール送信機能(sendgrid)（少し整備中）

### 使用技術:
- PHP 8.2.1 
- Laravel Framework 9.19
- mysql 8.0.31
- tailwindcss 3.0.0
- vue.js 3.2.29
- axios 0.21.1
- inertiajs/inertia-laravel 0.6.3
- AWS(S3)
- Docker
- TeachableMachine

#### なぜその技術を使ったか  
- TailwindCSS はユーティリティファーストのフレームワークだったので CSS をスクラッチで書くくらいの表現力を少ない記述量かつ自由に書けるため。ほかのフレームワークも検討したが Bootstrap やVuetify などはコンポーネントファーストだっため除外した。  
## 利用方法
git clone https://github.com/k-hayack884/flower-diary.git  
composer install  
composer update  
npm install  
npm run dev  

seederおよびfactoryがありますので、ダミーデータが必要な場合はコメントアウトを解除して、  
php artisan migrate::refresh  --seed  
を入力してください。   

php artisan key:generate   
と入力してキーを生成後、  
php artisan serve  
で簡易サーバーを立ち上げ、表示確認してください。
<br>
テストアカウント    
email barianbooks@gmail.com  
password shirokitate
<br>

画像を登録したい場合、AWSのs3を利用する必要があります。  
AWSのs3でバケットを作成した後、envに  
AWS_ACCESS_KEY_ID=AWSのアクセスキー  
AWS_SECRET_ACCESS_KEY=AWSのシークレットアクセスキー  
AWS_DEFAULT_REGION=AWSのリージョン  
AWS_BUCKET=s3のバケット名  
AWS_URL=https://s3-(リージョン).amazonaws.com/（バケット名）/  
を追記してください

## サイトや機能の全体図
### ユーザー側
![スクリーンショット (130)](https://github.com/k-hayack884/flower_diary/assets/85856269/88f66ed6-6e95-4c15-9601-a64ff5a97574)

## データベース構成
![スクリーンショット (129)](https://github.com/k-hayack884/flower_diary/assets/85856269/24f86931-ad98-46c4-84a5-62584c8f59be)

## ユーザに使ってもらって見つかった課題
- 植物判別の精度が良くない  
現在使用している学習モデルの学習ステップが不足しているため、精度を上げたいが、膨大なデータが必要である。
自身のパソコンのスペックだと難しいので、別の方法があればいい。


## 今後追加したい機能
-コメント機能 
自分のmyプラントを利用して他のユーザーと交流するために、コメント機能をつけたい。そのためにはほかのユーザーの日記の閲覧だけ許可するように認証を作っていかないといけない。
また、他ユーザーの新着日記や、myプラントと同じ種類の植物の日記をつけているユーザーの日記の一覧を表示できるような、ページを作る必要がある。
- 病気の判別機能  
植物の病気や害虫などによる、症状を判別できるようにしたい。
そのためには、病気専用の学習モデルを作る必要がある。しかし、植物の種類によって症状が違うこともあるので、どこまで精度を上げるかが課題。
- googleアカウントから新規登録、ログインする機能  
新規登録やログイン登録の手間を省き、気軽に利用できるようにするため
- 管理機能
現状は一人用なので、さほど問題がないが、コメント機能などほかのユーザーがかかわるのであれば、不適切な日記やコメントが入る可能性がある。
そのため、管理専用ページを使って、不適切なコメントなどを非表示にしたい。

近いうちに改善予定
## ライセンス
Copyright (c) [2023] [k-hayack884]
