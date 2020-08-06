@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('product.store') }}"  role="form" enctype="multipart/form-data">
    {{csrf_field()}}
    	<div class="form-group">
    	<input name="sku" type="Text" placeholder="SKU">
    	</div>
    	<div class="form-group">
    	<input name="name" type="Text" placeholder="producto">
    	</div>
		<button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    @foreach($products as $product)
    {{$product->sku}}
    {{$product->name}}
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop