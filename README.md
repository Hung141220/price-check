<h1 align="center"><a href="https://laravel.com/docs/5.4/installation#server-requirements" target="_blank">DEPLOY APPLICATION</a></h1>

## CẤU HÌNH HỆ THỐNG
- OS:linux
- Apache
- PHP >= 7.2.5
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- XML-RPC Extension
- Mode rewrite
- Allow htaccess
- Composer
- Git
- Soap
- zip library for php

## Tên miền
```
live: 
staging: 
```

## Clone Project
```
http://git.bk-hub.vn/ngonguyentuanhhon/price-check
```

## File database trong thu mục
```

```

## Tạo file .env 
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:qPVZy6K9ZVhgfpNHB17zbnvGh2AwllDeGyFFg9bwaks=
APP_DEBUG=true
APP_URL=http://localhost/price-check/public/

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```

## Tạo folder [storage] và các thu mục con nếu chưa có 

```
- storage :
    + framework : 
        ++ cache
        ++ sessions
        ++ views
```

## Phân quyền đọc, ghi file cho folder storage and và bootstrap/cache

## Chạy composer: từ thư mục gốc chạy các lệnh sau 
```
b1: composer update
b2: composer dumpautoload
```
