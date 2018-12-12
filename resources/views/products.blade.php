<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="/">Zakumi</a>
        
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/products">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Category</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h3>Danh sách sản phẩm</h3>
        <div class="row">
            @foreach ($products as $p)
                <div class="card col-sm-3">
                    <img class="card-img-top" src="/images/product.png" alt="Card image">
                    <div class="card-body">
                        <a href="#">
                            <h4 class="card-title">{{ $p->name }}</h4>
                        </a>
                        <p class="card-text">{{ $p->description }}</p>
                        <a href="#" class="btn btn-primary">Buy now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="footer font-fig bg-dark">
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="https://lequyettien.blogspot.com"> Le Quyet Tien</a>
        </div>
    </footer>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>