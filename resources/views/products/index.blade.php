@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div><h1>Catalogo</h1></div>
    <form method="POST" action="{{ route('product.store') }}"  name="importform" enctype="multipart/form-data">
         {{ csrf_field() }}
      <div class="form-group float-left">
        <label for="file">Subir inventario</label>
        <input type="file" name="file" class="form-control">
        <button class="button" type="submit">Importar Archivo</button>
      </div>
    </form>
@stop

@section('content')
 <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th>Linea</th>
                        <th>SKU</th>
                        <th>EAN</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>ITTEM 1</th>
                        <th>ITEM 2</th>
                        <th>ITEM 3</th>
                        <th>ITEM 4</th>
                        <th>ITEM 5</th>
                        <th>Generic Keywords</th>
                        <th>Platinum Keywords</th>
                        <th>Stock</th>
                        <th>Coste</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                      <tr>
                        <td><a href="#">{{$product->id}}</a></td>
                        <td><span class="badge badge-danger">Inactivo</span></td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->line}}</td>
                        <td>{{$product->sku}}</td>
                        <td>{{$product->ean}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->desc}}</td>
                        <td>{{$product->i_1}}</td>
                        <td>{{$product->i_2}}</td>
                        <td>{{$product->i_3}}</td>
                        <td>{{$product->i_4}}</td>
                        <td>{{$product->i_5}}</td>
                        <td>{{$product->generic_keyword}}</td>
                        <td>{{$product->platinum_keyword}}</td>
                        <td class="badge badge-danger stock-number">{{$product->stock}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-primary mb-2">Editar</a>

                          <a style="display: inline-block;" href="#" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                      </tr>  
                      @endforeach                    
                    </tbody>
                  </table>
                </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
     <link rel="stylesheet" href="/css/style.css">
     <style>

        td{
            font-size: 14px;
        }
         .stock-number{
            margin-top:10px; 
            padding-top: 8px;
            padding: 8px;      

        }
     </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop