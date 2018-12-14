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

                <div class="form-group">
                    {!! Form::label('name', 'Tên sản phẩm') !!}
                    {!! Form::text('name', null, ['id' => 'name', 'placeholder' => 'name', 'class' => 'form-control']) !!}
                </div>  

                <div class="form-group">
                    {!! Form::label('description', 'Mô tả') !!}
                    {!! Form::text('description', null, ['id' => 'description', 'placeholder' => 'description', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Giá') !!}
                    {!! Form::text('price', null, ['id' => 'price', 'placeholder' => 'price', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('quantity', 'Số lượng') !!}
                    {!! Form::text('quantity', null, ['id' => 'quantity', 'placeholder' => 'quantity', 'class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div> <!-- .col-sm-6 -->
    </div> <!-- .row -->
@endsection