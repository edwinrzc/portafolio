@extends('main')

@section('contenido')

<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Administrador de Roles</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-b-30 m-t-0">Roles</h4>
                            <div class="row">
                                <div class="col-md-12 m-b-5">
                                	<a href="{{ route('roles.create') }}" class="btn btn-primary">Nuevo Role</a>
                                	
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Usuarios</th>
                                                <th width="20%"></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach( $roles as $role)                                        
                                                <tr>
                                                    <td>{{ $role->name }}</td>
                                                    <td>{{ $role->description }}</td>
                                                    <td>{{ $role->users->pluck('id')->count() }}</td>
                                                    <td>                                                    	
                                                      	<a href="{{ route('roles.edit', $role->id) }}" title="Editar Role" class="btn btn-default" >
                                                      		<i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                      	</a>
                                                      	<a href="{{ route('roles.assigned', $role->id) }}" title="Configurar Permisos" class="btn btn-default" >
                                                      		<i class="fa fa-plus-square" aria-hidden="true"></i>
                                                      	</a>
                                                      	@if( $role->users->pluck('id')->count() == 0)
                                                      	<form id="delete_role_{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" style="display: inline;" method="POST">
                                                      		{!! csrf_field() !!}
                                                      		{!! method_field('DELETE') !!}
                                                      		<a href="" class="btn_delete_role btn btn-default" title="Eliminar Role" data-id="{{ $role->id }}" >
                                                      			<i class="fa fa-trash "></i>
                                                      		</a>                  		                   		                 		
                                                  		</form>
                                                      	@endif
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
		$('body').delegate('.btn_delete_role','click',function()
		{
			var id = $(this).attr('data-id');
			$('#delete_role_'+id).submit();
			return false;
		});
	});
@stop



