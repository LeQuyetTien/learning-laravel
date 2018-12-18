# learning_laravel

Tìm hiểu Laravel

## Phần I: Series - Xây dựng một shop online sử dụng Laravel

Tham khảo bài viết: [Xây dựng một blog đơn giản sử dụng Laravel](https://laptrinh.io/series/xay-dung-mot-blog-don-gian-su-dung-laravel)

### Bài 1: Thiết lập môi trường phát triển cơ bản

#### Cài đặt laravel bằng composer

```bash
composer global require laravel/installer
```

#### Khởi tạo project

```bash
laravel new [TÊN_PROJECT]
```

#### Chạy thử project

```bash
cd [TÊN_PROJECT]
php artisan serve
```

### Bài 2: Cấu trúc các thư mục

Cấu trúc thư mục: <http://laravel.com.vn/docs/5.7/structure>

### Bài 3: Cấu hình project

#### Kết nối database

1. Tạo database trong phpMyAdmin
2. Cập nhật các tham số database trong file `.env`

```php
DB_DATABASE=[TÊN_DATABASE]
DB_USERNAME=[USERNAME]
DB_PASSWORD=[PASSWORD]
```

Lưu ý: Nếu tạo database với collation khác `utf4mb4` thì cần vào `config/database.php` cập nhật lại 2 giá trị `charset` và `collation` nếu không sẽ bị lỗi.

> Ví dụ mình sử dụng **mysql** và tạo database với collation là `utf8_unicode_ci` thì mình tìm đến **connections -> mysql** rồi đổi lại như sau:
>> 'charset' => 'utf8',                  //Mặc định là utf8mb4
>> 'collation' => 'utf8_unicode_ci',     //Mặc định là utf8mb4-unicode_ci

#### Browsersync Reloading

Sử dụng Laravel Mix để tự động load lại trang khi develop

1. Cài đặt Node
2. Chạy câu lệnh `npm install` trong thư mục project để cài đặt các package vào thư mục `node_modules`
3. Thêm câu lệnh `mix.browserSync('127.0.0.1:8000');` vào cuối file `webpack.mix.js`
4. Chạy 2 câu lệnh sau cùng lúc (mở 2 cửa sổ cmd để chạy 2 câu lệnh)

```bash
npm run watch
php artisan serve
```

Tìm hiểu thêm về Lavavel Mix trong link sau: [Compiling Assets (Mix)](https://laravel.com/docs/5.7/mix)

### Bài 4: Thiết lập giao diện

#### Import Boostrap

1. Download Boostrap
    - Link download từ trang chủ: <https://getbootstrap.com/docs/4.1/getting-started/download/>
    - Link download từ github (có thư mục fonts): <https://github.com/twbs/bootstrap/tree/master>
2. Giải nén
3. Copy file `bootstrap.min.css` vào `thư mục public/css`
4. Copy file `bootstrap.min.js` vào `thư mục public/js`
5. Copy thư mục `font` vào trong thư mục `public`

#### Import jQuery

1. Download jQuery
    - Link download: <https://jquery.com/download/>
2. Giải nén
3. Copy file `jquery.min.js` vào `thư mục public/js`

#### Thêm Bootstrap và jQuery vào View

Sau khi import bootstrap và jQuery chúng ta sẽ thêm 3 file trên vào view

```php
<link rel="stylesheet" href="/css/bootstrap.min.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
```

### Bài 5: Xây dựng thành phần cơ bản cho trang chủ

#### Tạo controller

```bash
php artisan make:controller [TÊN_CONTROLLER]
```

Tài liệu về `Controllers`: <https://laravel.com/docs/5.7/controllers>

### Bài 6: Database, migration và model

#### Migration

Để tạo migration cho bảng products ta dùng câu lệnh sau:

```bash
php artisan make:migration create_products_table
```

Sau khi chạy lệnh trên, 1 file tên là `[TIMESTAMP]_create_products_table.php` sẽ được tạo trong thư mục `database/migrations`

Chúng ta sẽ thêm các fields vào trong function `up`

```php
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

```bash
php artisan migrate
```

Sau khi chạy lệnh trên, ta vào database trong phpMyAdmin (nếu sử dụng mysql) sẽ thấy *table **products*** đã được tạo

Tài liệu về `Migration`: <https://viblo.asia/p/tim-hieu-ve-migration-trong-laravel-bWrZn1MpKxw>

#### Model

Để tạo model Product ta dùng câu lệnh sau:

```bash
php artisan make:model Product
```

Sau khi chạy lệnh trên, 1 file tên là `Product.php` sẽ được tạo trong thư mục `app`

Chúng ta sẽ liên kết *model **Product*** với *table **products*** bằng câu lệnh sau:

```php
class Product extends Model
{
    protected $table = 'products';
}
```

Để import *model **Product*** vào controller ta sử dụng câu lệnh sau:

```php
use App\Product;
```

### Bài 7: Chuyển hướng route tới link của một sản phẩm

### Bài 8: Tối ưu hoá việc sử dụng route

### Bài 9: Tối ưu hoá các views

Blade Templates: <https://laravel.com/docs/5.7/blade>

### Bài 10: Tạo data giả khi phát triển

Faker: <https://github.com/fzaninotto/Faker>

Để cài đặt Faker ta chạy lệnh sau:

```bash
composer require --dev fzaninotto/faker
```

Để tạo seeding cho products table ta sử dụng câu lệnh sau:

```bash
php artisan make:seeder ProductsTableSeeder
```

Sau khi chạy lệnh trên, 1 file tên là `ProductsTableSeeder.php` sẽ được tạo trong thư mục `database/seeds`

Chúng ta sẽ cập nhật hàm tạo trong file này

```php
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

        for ($i=0; $i < 10; $i++)
        {
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

```bash
php artisan db:seed --class=ProductsTableSeeder
```

Để chạy nhiều faker 1 lúc, ta có thể thêm các class vào file `DatabaseSeeder.php` trong thư mục `database/seeds` như sau:

```php
public function run()
{
    $this->call(UsersTableSeeder::class);
    $this->call(ProductsTableSeeder::class);
}
```

Và chạy câu lệnh sau để tạo nhiều faker:

```bash
php artisan db:seed
```

### Bài 11: Thiết kế giao diện form thêm sản phẩm

Forms Boostrap 4: <https://www.w3schools.com/bootstrap4/bootstrap_forms.asp>

### Bài 12: Tạo sản phẩm mới với dữ liệu gửi từ form

Trong Product model cần khai báo các trường có thể điền như sau:

```php
class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name', 'description', 'image', 'price', 'quantity',
    ];
}
```

Trong form cần thêm câu lệnh `@csrf` để tạo token xác thực trước khi controller xử lý. Câu lệnh này tương đương lệnh sau:

```php
<input type="hidden" name="_token" value="{{ csrf_token() }}">
```

### Bài 13: Kiểm tra dữ liệu từ form

Để kiểm tra dữ liệu từ form ta tạo một product form request như sau:

```bash
php artisan make:request ProductFormRequest
```

Sau khi chạy lệnh trên, 1 file tên là `ProductFormRequest.php` sẽ được tạo trong thư mục `app/Http/Requests`

Trong file này có 2 function là `authorize` và `rules`

Để sử dụng ProductFormRequest ta sẽ đưa nó vào trong function cần xử lý như sau:

```php
public function store(ProductFormRequest $request)
```

Lúc này nếu chúng ta thử tạo một sản phẩm và submit thì sẽ xuất hiện lỗi *403:This action is unauthorized* bởi vì lúc này hàm `authorize` trong `ProductFormRequest` đang là `return false`. Ta cần sửa lại thành `return true`.

Và để bắt lỗi nhập liệu trong form thì ta sẽ thêm vào hàm `ruler` như sau:

```php
public function rules()
    {
        return [
            'name' => 'required|unique:products|max:255',
            'description' => 'required|min:5|max:255',
            'image' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ];
    }
```

Để hiển thị lỗi trong form ta sử dụng câu lệnh sau:

```php
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

Tìm hiểu thêm về Validation: <https://laravel.com/docs/5.7/validation>

### Bài 14: Đơn giản hoá cách sử dụng và thiết kế form gửi dữ liệu

### Bài 15: Tạo form chỉnh sửa bài viết

### Bài 16: Tối ưu hoá việc sử dụng form trong blade

### Bài 17: Xử lý xoá bài viết

### Bài 18: Xử lý phân trang

Paginate: <https://laravel.com/docs/5.7/pagination>

## Phần II: Phát triển thêm

### Bài 1: Upload file hình ảnh

Để thêm field hình ảnh vào trong form ta sử dụng câu lệnh sau:

```php
{!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}
    ...
    {!! Form::label('image', 'Hình ảnh') !!}
    {!! Form::file('image') !!}
    ...
{!! Form::close() !!}
```

> Chú ý: Cần phải thêm tham số `'files' => true` vào form, nếu không chúng ta không thể lấy được đối tượng `UploadedFile` mà chỉ lấy được tên file.

Để lấy nội dung file ta sử dụng câu lệnh sau:

```php
$request->file('image')
```

Hoặc

```php
$request->image
```

Để lưu file đã upload vào thư mục `public/images/products` ta sử dụng câu lệnh sau:

```php
$imageName = $request->file('image')->getClientOriginalName();
$request->file('image')->move('images/products/', $imageName);
```

Để xóa file ta sử dụng câu lệnh sau:

```php
use Illuminate\Support\Facades\File;
...
    File::delete(public_path().'/images/products/'.$product->image);
...
```

### Bài 2: Cập nhật và tối ưu hóa hệ thống

#### Cập nhật Route

Thay thế:

```php
Route::get('/products/{id}', [
    'as'    => 'product.detail',
    'uses'  => 'ProductsController@detail'
]);
```

bằng:

```php
Route::get('/products/{id}', 'ProductsController@detail')->name('product.detail');
```

Các bạn có thể thấy là code mới gọn gàng hơn nhiều!

#### Sửa lỗi conflic Route

Trong series (Bài 11 và Bài 15) chúng ta thấy khi sử dụng `Route::get('/products/create'` và `Route::get('/products/edit'` sau `Route::get('/products/{id}'` sẽ gây ra lỗi. Vì lúc này Laravel hiều nhầm rằng `create` và `edit` là biến `id` chúng ta cần truyền vào, trong khi biến `id` của chúng ta là kiểu `interger`.

Để sửa lỗi này chúng ta có thể thêm ràng buộc cho biến `id` như sau:

```php
Route::get('/products/{id}', 'ProductsController@detail')->name('product.detail')
    ->where('id', '[0-9]+');
```

Nếu muốn sử dụng điều kiện này cho bất kỳ Route nào sử dụng biến `id` thì chúng ta chỉ cần thêm vào file `RouteServiceProvider.php` như sau:

```php
public function boot()
{
    Route::pattern('id', '[0-9]+');

    parent::boot();
}
```

#### Cập nhật đường đẫn file `.css`, `.js` và `href`

Thay thế:

```php
<link rel="stylesheet" href="/css/bootstrap.min.css">
<script src="/js/jquery.min.js"></script>
```

bằng:

```php
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
```

Nếu sử dụng code cũ, nó sẽ chạy đúng với `php artisan serve` nhưng khi truy `http://localhost/[PROJECT_NAME]/public/` trong Apache sẽ bị lỗi đường dẫn

Tương tự, ta sử dụng:

```php
<a class="nav-link" href="{{ route('product.index') }}">Product</a>
```

thay vì:

```php
<a class="nav-link" href="/products">Product</a>
```

## Tài liệu tham khảo

1. [laravel.com](https://laravel.com/docs/)
2. [markdownguide.org](https://www.markdownguide.org/basic-syntax/)