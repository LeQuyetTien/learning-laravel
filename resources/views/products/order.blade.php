@extends('layouts.app')

@section('head.title', 'Order')

@section('body.sidebar')
    @parent
@endsection

@section('body.content')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <h3>Hóa đơn</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                
            {!! Form::open(['route' => ['product.buy', $product->id], 'method' => 'post']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Họ tên') !!}
                {!! Form::text('name', null, ['id' => 'name', 'placeholder' => 'name', 'class' => 'form-control']) !!}
            </div>  
            
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['id' => 'email', 'placeholder' => 'email', 'class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('phone', 'Số điện thoại') !!}
                {!! Form::text('phone', null, ['id' => 'phone', 'placeholder' => 'phone', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address', 'Địa chỉ') !!}
                {!! Form::text('address', null, ['id' => 'address', 'placeholder' => 'address', 'class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('note', 'Ghi chú') !!}
                {!! Form::text('note', null, ['id' => 'note', 'placeholder' => 'note', 'class' => 'form-control']) !!}
            </div>
            
            {!! Form::submit('Gửi', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div> <!-- .col-sm-6 -->
    </div> <!-- .row -->
@endsection