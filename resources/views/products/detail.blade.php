@extends('layouts.app')

@section('head.title', 'Detail')

@section('body.sidebar')
    @parent
@endsection

@section('body.content')
    <a href="{{ url('/products') }}">
        <span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        Back
    </a>
    <div class="row">
        <div class="col-sm-4 product-card">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Giá: {{ $product->price }}</p>
            <p>Số lượng: {{ $product->quantity }}</p>
        </div>
    </div>
@endsection