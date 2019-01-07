@extends('main')

@section('contenido')
<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Cambio de Clave: {{ $user->getFullName() }}</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
						@if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">

                                    <div class="m-t-20">
                                        <form class="" method="post" action="{{ route('usuarios.updatepass', $user->id) }}" >
                                        {!! method_field('PUT') !!}
                                        {!! csrf_field() !!}
                                            
                                            <div class="form-group">
                                                <label>Clave</label>
                                                <input type="password" name="password" class="form-control" required placeholder="Clave"/>
                                                {{ $errors->first('password') }}
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Clave Confirmación</label>
                                                <input type="password" name="password_confirmation" class="form-control" required placeholder="Clave Confirmación"/>
                                                {{ $errors->first('password_confirmation') }}
                                            </div>
                                            
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Actualizar
                                                    </button>
                                                    <a href="{{ route($volver) }}" class="btn btn-default waves-effect m-l-5" >
                                                    	Volver
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
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