@extends('main')

@section('contenido')

<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">{{ $title}}</h4>
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
                                	<a href="{{ route('equipotrabajo.create') }}" class="btn btn-primary">Nuevo Miembro</a>
                                	
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Cargo</th> 
                                                <th width="15%"></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach( $equipos as $equipo)                                        
                                                <tr>
                                                    <td>{{ $equipo->nombre }}</td>
                                                    <td>{{ $equipo->apellido }}</td>
                                                    <td>{{ $equipo->cargo }}</td>
                                                    <td>                                                    	
                                                      	<a href="{{ route('equipotrabajo.edit', $equipo->id) }}" title="Editar Miembro" class="btn btn-default" >
                                                      		<i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                      	</a>
                                                      	<!-- a href="{{ route('portafolio.crop', $equipo->id) }}" title="Ajustar Imagen" class="btn btn-default" >
                                                      		<i class="fa fa-crop" aria-hidden="true"></i>
                                                      	</a> -->
                                                      	<a href="{{ route('portafolio.galery', $equipo->id) }}" title="Agregar Galeria Imagen" class="btn btn-default" >
                                                      		<i class="fa fa-image" aria-hidden="true"></i>
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


