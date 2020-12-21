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
                                	<a href="{{ route('portafolio.create') }}" class="btn btn-primary">Nuevo Portafolio</a>
                                	
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Titulo</th>
                                                <th>Categoría</th>
                                                <th>Cliente</th>                                                
                                                <th>Sitio</th>
                                                <th>Estatus</th>
                                                <th width="15%"></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach( $portafolios as $portafolio)                                        
                                                <tr>
                                                    <td>{{ $portafolio->titulo }}</td>
                                                    <td>{{ $portafolio->categoria }}</td>
                                                    <td>{{ $portafolio->cliente }}</td>
                                                    <td>{{ $portafolio->sitio }}</td>
                                                    <td>{{ $portafolio->status }}</td>
                                                    <td>                                                    	
                                                      	<a href="{{ route('portafolio.edit', $portafolio->id) }}" title="Editar Portafolio" class="btn btn-default" >
                                                      		<i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                      	</a>
                                                      	<a href="{{ route('portafolio.crop', $portafolio->id) }}" title="Ajustar Imagen" class="btn btn-default" >
                                                      		<i class="fa fa-crop" aria-hidden="true"></i>
                                                      	</a>
                                                      	<a href="{{ route('portafolio.galery', $portafolio->id) }}" title="Agregar Galeria Imagen" class="btn btn-default" >
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


