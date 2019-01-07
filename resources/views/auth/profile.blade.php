@extends('main')

@section('contenido')
<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Perfil de Usuario</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">

                        <div class="panel-body">						
                            
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">

                                    <div class="m-t-20">
                                    
                                    	<dl class="row">
                                            <dt class="col-sm-6">Nombre:</dt>
                                            <dd class="col-sm-6">{{ $user->name }}</dd>
                                            
                                            <dt class="col-sm-6">Apellido:</dt>
                                            <dd class="col-sm-6">{{ $user->lastname }}</dd>
                                            
                                            <dt class="col-sm-6">Email:</dt>
                                            <dd class="col-sm-6">{{ $user->email }}</dd>
                                            
                                            <dt class="col-sm-6">Estado</dt>
                                            <dd class="col-sm-6">{{ ($user->state == 1)? "Activo" : 'Inactivo' }}</dd>
                                            
                                        </dl>
                                        <div class="row">
                                        	<div>
                                                <a href="{{ route('index') }}" class="btn btn-default waves-effect m-l-5" >
                                                	Volver
                                                </a>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                </div>

                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- end row -->

        </div><!-- container -->

    </div> <!-- Page content Wrapper -->

</div> <!-- content -->
@stop