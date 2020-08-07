@extends('adminlte::page')

@section('title', 'Casos')

@section('content_header')
    <div><h1>Casos</h1></div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Crear caso
  </button>
@stop

@section('content')
 <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>ID</th>
                        <th>EAN</th>
                        <th>IPXS</th>
                        <th>PRODUCTO</th>
                        <th>Detalles</th>
                        <th>Anotaciones</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($cases as $case)
                      <tr>
                         <td><a href="#">{{date("d-m-Y",strtotime($case->created_at))}}</a></td>
                        <td><a href="#">{{$case->state}}</a></td>
                        <td><span class="badge badge-danger">{{$case->id}}</span></td>
                        <td>{{$case->ean}}</td>
                        <td>{{$case->ipxs}}</td>
                        <td>{{$case->product}}</td>
                        <td>{{$case->details}}</td>
                        <td>{{$case->annotation}}</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-primary mb-2">Editar</a>

                          <a style="display: inline-block;" href="#" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                      </tr>  
                      @endforeach                    
                    </tbody>
                  </table>
                </div>
                <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('cases.store') }}"  role="form" enctype="multipart/form-data">
           {{ csrf_field() }}
            <div class="form-group">
                  <input type="text" name="caseID" placeholder="ID">
            </div>
             <div class="form-group">
                  <input type="text" name="ean" placeholder="EAN">
            </div>
             <div class="form-group">
                  <input type="text" name="ipxs" placeholder="IPXS">
            </div>
             <div class="form-group">
                  <input type="text" name="product" placeholder="Product">
            </div>
             <div class="form-group">
                  <textarea id="details" name="details" placeholder="Details"></textarea>
            </div>
             <div class="form-group">
                  <textarea placeholder="Anotaciones" name="annotation"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
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