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

{!! Form::submit($button_name, ['class' => 'btn btn-primary']) !!}