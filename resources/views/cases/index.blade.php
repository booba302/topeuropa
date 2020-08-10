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
                  <table id="casesTable" class="display nowrap" cellspacing="0" style="width:100%" >
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
                        <th>Gestor</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($cases as $case)
                    
                    <!-- Getting the intials of the user full bname -->
                      <tr data-key-1="{{$case->product}}" data-key-2="{{$case->details}}" data-key-3="{{$case->annotation}}">
                        <td><a href="#">{{date("d-m-Y",strtotime($case->created_at))}}</a></td>
                        <td><span class="badge badge-warning" style="color:White; font-size: 13px">{{$case->state}}</span></td>
                        <td>{{$case->id}}</span></td>
                        <td>{{$case->ean}}</td>
                        <td>{{$case->ipxs}}</td>
                        <td class="details-control-product">{{\Illuminate\Support\Str::limit($case->product, 10) }}</td>
                        <td class="details-control-details">{{\Illuminate\Support\Str::limit($case->details, 10) }}</td>
                        <td class="details-control-annotation">{{\Illuminate\Support\Str::limit($case->annotation, 10) }}</td>
                        <td>{{$case->user}}</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-primary">Editar</a>

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
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
     <style>

        @import url('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css');
        
         td.details-control-product {
            cursor: pointer;
            position: relative;
        }
        tr.shown td.details-control-product {
            position: relative;
        }

        td.details-control-details {
            cursor: pointer;
            position: relative;
        }
        tr.shown td.details-control-details {
            position: relative;
        }

        td.details-control-annotation {
            cursor: pointer;
            position: relative;
        }
        tr.shown td.details-control-annotation {
            position: relative;
        }

        td{
            font-size: 14px;
     </style>
@stop

@section('js')
   <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
      
       function format(dataSource) {
      var html= '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      for (var key in dataSource){
         html +='<tr>'+
            '<td>'+ key +'</td>'+
            '<td>'+ dataSource[key] +'</td>'+
        '</tr>';
      }
      return html + '</table>';
  }
  $(document).ready(function () {
      var table = $('#casesTable').DataTable({});

      // Add event listener for opening and closing details
      $('#casesTable').on('click', 'td.details-control-product', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format({

                'Nombre del Producto' : tr.data('key-1'),
                
              })).show();
               
              tr.addClass('shown');
          }
      });

         $('#casesTable').on('click', 'td.details-control-details', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format({

                'Detalles del caso' : tr.data('key-2')

              })).show();
               
              tr.addClass('shown');
          }
      });

         $('#casesTable').on('click', 'td.details-control-annotation', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format({
                'Anotaciones' : tr.data('key-3')
              })).show();
               
              tr.addClass('shown');
          }
      });
  });


      </script>
@stop