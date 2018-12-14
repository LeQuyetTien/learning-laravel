@extends('layouts.app')

@section('head.title', 'Create')

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

                @include('products._form', ['button_name' => 'Thêm'])

            {!! Form::close() !!}

        </div> <!-- .col-sm-6 -->
    </div> <!-- .row -->
@endsection