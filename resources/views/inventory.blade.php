@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div><h1>Catalogo</h1></div>
    <form>
  <div class="form-group float-left">
    <label for="exampleFormControlFile1">Subir inventario</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
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
                      <tr>
                        <td><a href="#">01</a></td>
                       <td><span class="badge badge-danger">Inactivo</span></td>
                        <td>ALIMENTACIÓN</td>
                        <td>TÉ</td>
                        <td>ALIME TE SAUCO 02</td>
                        <td>12311341241</td>
                        <td>Te para infuciones</td>
                        <td>12.90$</td>
                        <td>12</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td >12.90$</td>
                        <td class="badge badge-danger stock-number">12</td>
                        <td>12.90$</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-primary mb-2">Editar</a>

                          <a style="display: inline-block;" href="#" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">01</a></td>
                       <td><span class="badge badge-danger">Inactivo</span></td>
                        <td>ALIMENTACIÓN</td>
                        <td>TÉ</td>
                        <td>ALIME TE SAUCO 02</td>
                        <td>12311341241</td>
                        <td>Te para infuciones</td>
                        <td>12.90$</td>
                        <td>12</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td class="badge badge-success">12</td>
                        <td>12.90$</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-primary  mb-2">Editar</a>

                          <a style="display: inline-block;" href="#" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">01</a></td>
                       <td><span class="badge badge-danger">Inactivo</span></td>
                        <td>ALIMENTACIÓN</td>
                        <td>TÉ</td>
                        <td>ALIME TE SAUCO 02</td>
                        <td>12311341241</td>
                        <td>Te para infuciones</td>
                        <td>12.90$</td>
                        <td>12</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td>12.90$</td>
                        <td class="badge badge-success">12</td>
                        <td>12.90$</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-primary mb-2">Editar</a>

                          <a style="display: inline-block;" href="#" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                      </tr>
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