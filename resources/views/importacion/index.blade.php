@extends('main')

@section('contenido')

<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Importación de Deudas</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-b-30 m-t-0">Deudas</h4>
                            <div class="row">
                                <div class="col-md-12 m-b-5">
                                	<a href="{{ route('importacion.formupload') }}" class="btn btn-primary">Nueva Importación</a>
                                	
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Tipo</th>
                                                <th>Documento</th>
                                                <th>Producto</th>
                                                <th>Nro Producto</th>
                                                <th>Deuda</th>
                                                <th>Moneda</th>
                                                <th>Fecha Mora</th>
                                                <th width="15%"></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                                                                  
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->



        </div><!-- container -->

    </div> <!-- Page content Wrapper -->

</div> <!-- content -->
@stop

@section('javascript')
	$(document).ready(function()
	{
		$('body').delegate('.btn_delete_items','click',function()
		{
			var id = $(this).attr('data-id');
			$('#delete_item_'+id).submit();
			return false;
		});
	});
@stop


