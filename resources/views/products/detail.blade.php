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
        <div class="col-sm-12 text-center">
            <img class="card-img-top product-image" src="/images/{{ $product->image }}" alt="Card image">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Giá: {{ $product->price }}</p>
            <p>Số lượng: {{ $product->quantity }}</p>
        </div>
    </div>
    {{-- <a href="{{ url('/products/'.$product->id.'/edit') }}">Edit</a> --}}
    <a href="{{ route('product.edit', $product->id) }}">Edit</a>
@endsection