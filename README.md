# laravel
Tìm hiểu Laravel

## Bài 1: Thiết lập môi trường phát triển cơ bản

#### Cài đặt laravel bằng composer

```
composer global require laravel/installer
```

#### Khởi tạo project

```
laravel new [TÊN_PROJECT]
```

#### Chạy thử project

```
cd [TÊN_PROJECT]
php artisan serve
```

## Bài 2: Cấu trúc các thư mục

## Bài 3: Cấu hình project

#### Kết nối database

1. Tạo database trong phpMyAdmin
2. Cập nhật các tham số database trong file `.env`

```
DB_DATABASE=[TÊN_DATABASE]
DB_USERNAME=[USERNAME]
DB_PASSWORD=[PASSWORD]
```

Lưu ý: Nếu tạo database với collation khác `utf4mb4` thì cần vào `config/database.php` cập nhật lại 2 giá trị `charset` và `collation` nếu không sẽ bị lỗi.

> Ví dụ mình sử dụng **mysql** và tạo database với collation là `utf8_unicode_ci` thì mình tìm đến **connections -> mysql** rồi đổi lại như sau:<br/>
> 'charset' => 'utf8',                  //Mặc định là utf8mb4 <br/>
> 'collation' => 'utf8_unicode_ci',     //Mặc định là utf8mb4-unicode_ci <br/>

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

## Bài 4: Thiết lập giao diện

#### Import Boostrap

1. Download Boostrap
Link download từ trang chủ: https://getbootstrap.com/docs/4.1/getting-started/download/ <br/>
Link download từ github (có thư mục fonts): https://github.com/twbs/bootstrap/tree/master
2. Giải nén
3. Copy file `bootstrap.min.css` vào `thư mục public/css`
3. Copy file `bootstrap.min.js` vào `thư mục public/js`
4. Copy thư mục `font` vào trong thư mục `public`

#### Import jQuery

1. Download jQuery
Link download: https://jquery.com/download/
2. Giải nén
3. Copy file `jquery.min.js` vào `thư mục public/js`

#### Thêm Bootstrap và jQuery vào View

Sau khi import bootstrap và jQuery chúng ta sẽ thêm 3 file trên vào view

```
<link rel="stylesheet" href="/css/bootstrap.min.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
```

## Bài 5: Xây dựng thành phần cơ bản cho trang chủ

#### Tạo controller

```
php artisan make:controller [TÊN_CONTROLLER]
```

Tài liệu về `Controllers`: https://laravel.com/docs/5.7/controllers

## Bài 6: Database, migration và model

#### Migration

Để tạo migration cho bảng products ta dùng câu lệnh sau:

```
php artisan make:migration create_products_table
```

Sau khi chạy lệnh trên, 1 file tên là [TIMESTAMP]_create_products_table.php sẽ được tạo trong thư mục `database/migrations`

Chúng ta sẽ thêm các fields vào trong function `up`

```
public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->double('price', 10, 2);
            $table->integer('quantity');
            $table->timestamps();
        });
    }
```

Để chạy các migrations ta sử dụng câu lệnh sau:

```
php artisan migrate
```

Sau khi chạy lệnh trên, ta vào database trong phpMyAdmin (nếu sử dụng mysql) sẽ thấy *table **products*** đã được tạo

Tài liệu về `Migration`: https://viblo.asia/p/tim-hieu-ve-migration-trong-laravel-bWrZn1MpKxw

#### Model

Để tạo model Product ta dùng câu lệnh sau:

```
php artisan make:model Product
```

Sau khi chạy lệnh trên, 1 file tên là Product.php sẽ được tạo trong thư mục `app`

Chúng ta sẽ liên kết *model **Product*** với *table **products*** bằng câu lệnh sau:

```
class Product extends Model
{
    protected $table = 'products';
}
```

Để import *model **Product*** vào controller ta sử dụng câu lệnh sau:

```
use App\Product;
```

## Bài 7: Chuyển hướng route tới link của một sản phẩm

## Bài 8: Tối ưu hoá việc sử dụng route

## Bài 9: Tối ưu hoá các views

Blade Templates: https://laravel.com/docs/5.7/blade

## Bài 10: Tạo data giả khi phát triển

Faker: https://github.com/fzaninotto/Faker

Để cài đặt Faker ta chạy lệnh sau:

```
composer require --dev fzaninotto/faker
```

Để tạo seeding cho products table ta sử dụng câu lệnh sau:

```
php artisan make:seeder ProductsTableSeeder
```

Sau khi chạy lệnh trên, 1 file tên là `ProductsTableSeeder.php` sẽ được tạo trong thư mục `database/seeds`

Chúng ta sẽ cập nhật hàm tạo trong file này

```
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 10; $i++) { 
            $url = $faker->image($dir='[ĐƯỜNG_DẪN_ĐẾN_PROJECT]/public/images', $width='500', $height='500');
            $image = substr($url, strpos($url, '\\')+1);

            Product::create([
                'name' => $faker->sentence($nbWords = 5, $variableNbWords = true),
                'description' => $faker->sentence($nbWords = 20, $variableNbWords = true),
                'image' => $image,
                'price' => $faker->numberBetween(10000, 1000000),
                'quantity' => $faker->numberBetween(0, 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
```

Để chạy faker cho class **ProductsTableSeeder** ta sử dụng câu lệnh sau:

```
php artisan db:seed --class=ProductsTableSeeder
```

Để chạy nhiều faker 1 lúc, ta có thể thêm các class vào file `DatabaseSeeder.php` trong thư mục `database/seeds` như sau:

```
public function run()
{
    $this->call(UsersTableSeeder::class);
    $this->call(ProductsTableSeeder::class);
}
```

Và chạy câu lệnh sau để tạo nhiều faker:

```
php artisan db:seed
```

## Bài 11: Thiết kế giao diện form thêm sản phẩm

## Tài liệu tham khảo

1. [laravel.com](https://laravel.com/docs/)
2. [laptrinh.io](https://laptrinh.io/videos/thiet-lap-moi-truong-phat-trien-co-ban-WqFwveGxaK4)
3. [markdownguide.org](https://www.markdownguide.org/basic-syntax/)