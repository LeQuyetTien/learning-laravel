@extends('layouts.app')

@section('head.title', 'Home')

@section('body.sidebar')
    @parent
    <h3>Danh sách sản phẩm</h3>
@endsection

@section('body.content')
    <div class="row">
        @foreach ($products as $p)
            <div class="card col-sm-3">
                <img class="card-img-top" src="/images/product.png" alt="Card image">
                <div class="card-body">
                    <a href="{{ route('product.detail', $p->id) }}">
                        <h4 class="card-title">{{ $p->name }}</h4>
                    </a>
                    <p class="card-text">{{ $p->description }}</p>
                    <a href="#" class="btn btn-primary">Buy now</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection