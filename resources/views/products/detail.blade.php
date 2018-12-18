@extends('layouts.app')

@section('head.title', 'Detail')

@section('body.sidebar')
    @parent
@endsection

@section('body.content')
    <a href="{{ route('product.index') }}">
        <span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        Back
    </a>
    <div class="row">
        <div class="col-sm-12 text-center">
            <img class="card-img-top product-image" src="{{ asset('images/products/'.$product->image) }}" alt="Card image">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Giá: {{ $product->price }}</p>
            <p>Số lượng: {{ $product->quantity }}</p>
        </div>
    </div>

    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info">Edit</a>

    {!! Form::open([ 
        'route' => ['product.delete', $product->id],
        'method' => 'delete',
        'style' => 'display: inline'
    ]) !!}
        <button class="btn btn-danger">Delete</button>
    {!! Form::close() !!}
@endsection