@extends('layouts.app')

@section('head.title', 'Products')

@section('body.sidebar')
    @parent
    <h3>Danh sách sản phẩm</h3>
@endsection

@section('body.content')
    <div class="row">
        @foreach ($products as $p)
            <div class="card col-sm-3">
                <img class="card-img-top" src="/images/{{ $p->image }}" alt="Card image">
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

    <div class="row text-center mt-3">
        <div class="col-sm-4 offset-sm-4">
            {!! $products->render() !!}
        </div>
    </div>
@endsection