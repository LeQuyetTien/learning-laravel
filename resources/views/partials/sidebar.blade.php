<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="{{ route('home') }}">Zakumi</a>
    
    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product.index') }}">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product.create') }}">Add new product</a>
        </li>
    </ul>
</nav>