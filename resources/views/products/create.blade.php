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
        <div class="col-sm-6 offset-sm-3">

            <h3>Thêm sản phẩm mới</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                
            {!! Form::open(['route' => 'product.store', 'method' => 'post']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Tên sản phẩm') !!}
                    {!! Form::text('name', '', ['id' => 'name', 'placeholder' => 'name', 'class' => 'form-control']) !!}
                </div>  

                <div class="form-group">
                    {!! Form::label('description', 'Mô tả') !!}
                    {!! Form::text('description', '', ['id' => 'description', 'placeholder' => 'description', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Giá') !!}
                    {!! Form::text('price', '', ['id' => 'price', 'placeholder' => 'price', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('quantity', 'Số lượng') !!}
                    {!! Form::text('quantity', '', ['id' => 'quantity', 'placeholder' => 'quantity', 'class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Thêm', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div> <!-- .col-sm-6 -->
    </div> <!-- .row -->
@endsection