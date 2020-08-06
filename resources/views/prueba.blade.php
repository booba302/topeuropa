@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <form action="">
    	<div class="form-group">
    	<input type="Text" placeholder="SKU">
    	</div>
    	<div class="form-group">
    	<input type="Text" placeholder="producto">
    	</div>
		<button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop