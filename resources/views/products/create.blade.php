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
            
            <form action="{{ route('product.store') }}" method="post">

                @csrf

                <div class="form-group">
                  <label for="name">Tên sản phẩm</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="helpName" placeholder="Tên sản phẩm">
                  {{-- <small id="helpName" class="form-text text-muted">Help text name</small> --}}
                </div>  

                <div class="form-group">
                  <label for="description">Mô tả</label>
                  <textarea class="form-control" name="description" id="description" aria-describedby="helpDescription" placeholder="Mô tả" rows="3"></textarea>
                  {{-- <small id="helpDescription" class="form-text text-muted">Help text description</small> --}}
                </div>

                <div class="form-group">
                  <label for="price">Giá</label>
                  <input type="text" class="form-control" name="price" id="price" aria-describedby="helpPrice" placeholder="Giá">
                  {{-- <small id="helpPrice" class="form-text text-muted">Help text price</small> --}}
                </div>

                <div class="form-group">
                  <label for="quantity">Số lượng</label>
                  <input type="text" class="form-control" name="quantity" id="quantity" aria-describedby="helpQuantity" placeholder="Số lượng">
                  {{-- <small id="helpQuantity" class="form-text text-muted">Help text quantity</small> --}}
                </div>

                <button type="submit" class="btn btn-primary">Thêm</button>

            </form> <!-- form -->

        </div> <!-- .col-sm-6 -->
    </div> <!-- .row -->
@endsection