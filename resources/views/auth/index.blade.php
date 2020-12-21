@extends('main')

@section('contenido')

<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Administrador Usuarios</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-b-30 m-t-0">Usuarios</h4>
                            <div class="row">
                                <div class="col-md-12 m-b-5">
                                	<a href="{{ route('usuarios.create') }}" class="btn btn-primary">Nuevo Usuarios</a>
                                	
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>State</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach( $users as $user )                                        
                                                <tr>
                                                    <td>{{ $user->name.' '.$user->lastname }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                                    <td>{{ ($user->state == 1)? 'Activo' : 'Inactivo' }}</td>
                                                    <td>                                                 	
                                                      	<a href="{{ route('usuarios.edit', $user->id) }}" title="Editar Usuario" class="btn btn-default" >
                                                      		<i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                      	</a>                                               	
                                                      	<a href="{{ route('usuarios.changepassworduser', $user->id) }}" title="Cambiar Clave" class="btn btn-default" >
                                                      		<i class="fa fa-lock" aria-hidden="true"></i>
                                                      	</a>
                                                      	<a href="{{ route('roles.assigned', $user->id) }}" title="Configurar Permisos" class="btn btn-default" >
                                                      		<i class="fa fa-plus-square" aria-hidden="true"></i>
                                                      	</a>
                                                      	@if(auth()->user()->onlyPermited( collect(['ADMIN-USER']) ))
                                                      	<form id="delete_user_{{ $user->id }}" action="{{ route('usuarios.destroy', $user->id) }}" style="display: inline;" method="POST">
                                                      		{!! csrf_field() !!}
                                                      		{!! method_field('DELETE') !!}
                                                      		<a href="" class="btn_delete_user btn btn-default" title="Eliminar Usuario" data-id="{{ $user->id }}" >
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
		$('body').delegate('.btn_delete_user','click',function()
		{
			var id = $(this).attr('data-id');
			$('#delete_user_'+id).submit();
			return false;
		});
	});
@stop
