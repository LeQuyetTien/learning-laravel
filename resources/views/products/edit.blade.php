@extends('layouts.app')

@section('head.title', 'Edit')

@section('body.sidebar')
    @parent
@endsection

@section('body.content')
    <a href="{{ route('product.detail', $product->id) }}">
        <span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        Back
    </a>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <h3>Cập nhật sản phẩm</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                
            {!! Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'put']) !!}

            @include('products._form', ['button_name' => 'Cập nhật'])

            {!! Form::close() !!}

        </div> <!-- .col-sm-6 -->
    </div> <!-- .row -->
@endsection