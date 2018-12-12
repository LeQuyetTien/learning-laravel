# laravel
Tìm hiểu Laravel

## Bài 1: Thiết lập môi trường phát triển cơ bản

#### Cài đặt laravel bằng composer
```
composer global require laravel/installer
```

#### Khởi tạo project
```
laravel new laravel
```

#### Chạy thử project
```
cd laravel
php artisan serve
```

## Bài 2: Cấu trúc các thư mục

## Bài 3: Cấu hình project

#### Kết nối database
1. Tạo database trong phpMyAdmin
2. Cập nhật các tham số database trong file `.env`
```
DB_DATABASE=*[TÊN_DATABASE]*
DB_USERNAME=*[USERNAME]*
DB_PASSWORD=*[PASSWORD]*
```

> Nếu tạo database với collation khác `utf4mb4` thì cần vào `config/database.php` cập nhật lại 2 giá trị `charset` và `collation` nếu không sẽ bị lỗi.<br/>
> Ví dụ mình sử dụng **mysql** và tạo database với collation là `utf8_unicode_ci` thì mình tìm đến **connections -> mysql** rồi đổi lại như sau:<br/>
> 'charset' => 'utf8',                  /* Mặc định là utf8mb4 */<br/>
> 'collation' => 'utf8_unicode_ci',     /* Mặc định là utf8mb4-unicode_ci */<br/>

#### Browsersync Reloading
Sử dụng Laravel Mix để tự động load lại trang khi develop

1. Cài đặt Node
2. Chạy câu lệnh sau trong thư mục project để cài đặt các package vào thư mục `node_modules`
```
npm install
```
3. Thêm câu lệnh `mix.browserSync('127.0.0.1:8000');` vào cuối file `webpack.mix.js`
4. Chạy 2 câu lệnh sau cùng lúc (mở 2 cửa sổ cmd để chạy 2 câu lệnh)
```
npm run watch
php artisan serve
```

Tìm hiểu thêm về Lavavel Mix trong link sau: [Compiling Assets (Mix)](https://laravel.com/docs/5.7/mix)

## Tài liệu tham khảo
1. [laravel.com](https://laravel.com/docs/)
2. [laptrinh.io](https://laptrinh.io/videos/thiet-lap-moi-truong-phat-trien-co-ban-WqFwveGxaK4)