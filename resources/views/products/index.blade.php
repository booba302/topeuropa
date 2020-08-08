@extends('adminlte::page')

@section('title', 'Catalogo')

@section('content_header')
    <div><h1>Catalogo</h1></div>
    <form method="POST" action="{{ route('product.store') }}"  name="importform" enctype="multipart/form-data">
         {{ csrf_field() }}
      <div class="form-group float-left">
        <label for="file">Subir inventario</label>
        <input type="file" name="file" class="form-control">
      </div>
      <button class="btn btn-primary float-left ml-5" style="margin-top: 30px" type="submit">Importar Archivo</button>
    </form>
@stop

@section('content')
 <div class="table-responsive">
                  <table id="productsTable" class="display nowrap" cellspacing="0" style="width: 100%">
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
                        <th>ITEMS</th>
                        <th>Keywords</th>
                        <th>Stock</th>
                        <th>Coste</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                      <tr data-key-1="{{$product->i_1}}" data-key-2="{{$product->i_2}}" data-key-3="{{$product->i_3}}" data-key-4="{{$product->i_4}}" data-key-5="{{$product->i_5}}" data-key-6="{{$product->generic_keyword}}" data-key-7="{{$product->platinum_keyword}}" data-key-8="Prueba1" data-key-9="Prueba2" data-key-10="prueba3" data-key-11="{{$product->title}}" data-key-12="{{$product->desc}}">
                        <td><a href="#">{{$product->id}}</a></td>
                        <?php   

                          $state = 'Inactivo'


                         ?>
                        <td><span id="stateIndicator" class="badge badge-danger" productID="{{$product->id}}">{{$state}}</span></td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->line}}</td>
                        <td>{{$product->sku}}</td>
                        <td>{{$product->ean}}</td>
                        <td class="details-control-title">{{ \Illuminate\Support\Str::limit($product->title, 15) }}</td>
                        <td class="details-control-desc">{{ \Illuminate\Support\Str::limit($product->desc, 15) }}</td>
                        <td class="details-control"></td>
                        <td class="details-control-keywords"></td>
                        <td class="details-control-stock"><span class="badge badge-danger stock-number">{{$product->stock}}</span></td>
                        <td>{{$product->price}}</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-primary">Editar</a>

                          <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
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
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
     <style>

        @import url('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css');
        
         td.details-control-title {
            cursor: pointer;
            position: relative;
            right: 10px;
        }
        tr.shown td.details-control-title {
            position: relative;
            right: 10px;
        }

          td.details-control-desc {
            cursor: pointer;
            position: relative;
            right: 10px;
        }
        tr.shown td.details-control-desc {
            position: relative;
            right: 10px;
        }


         td.details-control {
            background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
        }

          td.details-control-keywords {
            background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control-keywords {
            background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
        }
        

        td.details-control-stock {
            background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
            cursor: pointer;
            position: relative;
            right: 30px;
        }
        tr.shown td.details-control-stock {
            background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
            position: relative;
            right: 30px;
        }

        #stateIndicator{
          cursor: pointer;
        }


        td{
            font-size: 14px;
        }
         .stock-number{
            margin-top:-2px; 
            padding-top: 8px;
            padding: 8px;
            margin-left: 60px;
        }
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
      var table = $('#productsTable').DataTable({});

      $('#stateIndicator').click(function () {

          $state = 'Inactivo'

          var productID = $(this).attr("productID");



              $('#stateIndicator').removeClass('badge-danger');
              $('#stateIndicator').addClass('badge-success');

              
          // $('#stateIndicator').removeClass('badge-danger');
          // $('#stateIndicator').addClass('badge-success');
      });

      // Add event listener for opening and closing details
      $('#productsTable').on('click', 'td.details-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format({

                'Item 1' : tr.data('key-1'),
                'Item 2' :  tr.data('key-2'),
                'Item 3' : tr.data('key-3'),
                'Item 4' :  tr.data('key-4'),
                'Item 5' : tr.data('key-5')

              })).show();
               
              tr.addClass('shown');
          }
      });

         $('#productsTable').on('click', 'td.details-control-keywords', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format({

                'Generic Keywords' : tr.data('key-6'),
                'platinum Keywords' : tr.data('key-7')
              })).show();
               
              tr.addClass('shown');
          }
      });

         $('#productsTable').on('click', 'td.details-control-stock', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format({

                'Disponible' : tr.data('key-8'),
                'Pendiente' : tr.data('key-9'),
                'Entrante' : tr.data('key-10')
              })).show();
               
              tr.addClass('shown');
          }
      });

         $('#productsTable').on('click', 'td.details-control-title', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format({

                'Titulo del producto' : tr.data('key-11')
              })).show();
               
              tr.addClass('shown');
          }
      });

          $('#productsTable').on('click', 'td.details-control-desc', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format({

                'Descripción del producto' : tr.data('key-12')
              })).show();
               
              tr.addClass('shown');
          }
      });
  });


      </script>
@stop