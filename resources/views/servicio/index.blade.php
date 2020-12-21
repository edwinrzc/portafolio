@extends('main')

@section('contenido')

<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Administrador Servicios</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 m-b-5">
                                	<a href="{{ route('servicio.create') }}" class="btn btn-primary">Nuevo Servicios</a>
                                	
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Titulo</th>
                                                <th>Descripción</th>
                                                <th>Codigo Imagen</th>                                                
                                                <th>Imagen</th>
                                                <th>Estatus</th>
                                                <th width="15%"></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach( $servicios as $servicio)                                        
                                                <tr>
                                                    <td>{{ $servicio->titulo }}</td>
                                                    <td>{{ $servicio->descripcion }}</td>
                                                    <td>{{ $servicio->imagencode }}</td>
                                                    <td>{{ $servicio->imagen }}</td>
                                                    <td>{{ $servicio->status }}</td>
                                                    <td>                                                    	
                                                      	<a href="{{ route('servicio.edit', $servicio->id) }}" title="Editar Servicios" class="btn btn-default" >
                                                      		<i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                      	</a>
                                                      	<a href="{{ route('servicio.preview', $servicio->id) }}" title="Vista Previa" class="btn btn-default" >
                                                      		<i class="fa fa-eye" aria-hidden="true"></i>
                                                      	</a>
                                                    </td>
                                                </tr>
                                        	@endforeach                                        
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


