@extends('main')

@section('contenido')
<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Actualizar Usuario</h4>
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
                                        <form class="" method="post" action="{{ route('usuarios.update', $user->id) }}" >
                                        {!! method_field('PUT') !!}
                                        {!! csrf_field() !!}

                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required placeholder="Nombre"/>
                                                {{ $errors->first('name') }}
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control" required placeholder="Apellido"/>
                                                {{ $errors->first('lastname') }}
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" value="{{ $user->email }}" class="form-control" required placeholder="Email"/>
                                                {{ $errors->first('email') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Roles</label>
                                                <div>
                                                	@foreach($roles as $row )
                                                    <div class="checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox{{ $row->id }}" value="{{ $row->id }}" name="roles[]"
                                                        	   {{ $user->roles->pluck('id')->contains($row->id)? 'checked' : '' }}
                                                               data-parsley-multiple="groups" >
                                                        <label for="checkbox{{ $row->id }}"> {{ $row->name.' - '.$row->description }} </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Estado</label>
                                                
												<select class="form-control" name="state" >
                                                    <option {{ ($user->state == 1)? "selected='selected'" : '' }} value="1">Activo</option>
                                                    <option {{ ($user->state == 0)? "selected='selected'" : '' }} value="0">Inactivo</option>
                                                    <option {{ ($user->state == 2)? "selected='selected'" : '' }} value="2">Pausado</option>
                                                </select>
                                                {{ $errors->first('state') }}
                                            </div>
                                            
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Registrar
                                                    </button>
                                                    <a href="{{ route('usuarios.index') }}" class="btn btn-default waves-effect m-l-5" >
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