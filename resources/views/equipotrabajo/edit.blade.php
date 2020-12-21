@extends('main')

@section('contenido')
<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">{{ $title }}</h4>
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
                                        <form class="" method="post" action="{{ route('equipotrabajo.update', $equipo->id) }}" enctype="multipart/form-data" >
                                        {!! method_field('PUT') !!}
                                        {!! csrf_field() !!}
                                        
                                        
                                        	<div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="nombre" value="{{ old('nombre',$equipo->nombre) }}" class="form-control" required />
                                                {{ $errors->first('nombre') }}
                                            </div>                                            
                                            
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input type="text" name="apellido" value="{{ old('apellido',$equipo->apellido) }}" class="form-control" required />
                                                {{ $errors->first('apellido') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Cargo</label>
                                                <input type="text" name="cargo" value="{{ old('cargo', $equipo->cargo) }}" class="form-control" required/>
                                                {{ $errors->first('cargo') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter" value="{{ old('twitter',$equipo->twitter) }}" class="form-control"/>
                                                {{ $errors->first('twitter') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Linkedin</label>
                                                <input type="text" name="linkedin" value="{{ old('linkedin',$equipo->linkedin) }}" class="form-control"/>
                                                {{ $errors->first('linkedin') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" name="facebook" value="{{ old('facebook',$equipo->facebook) }}" class="form-control"/>
                                                {{ $errors->first('facebook') }}
                                            </div>
                                            
                                            <div class="form-group m-b-10">
                                                <p>Foto</p>
                                                <input type="file" class="filestyle" name="foto" data-buttonname="btn-primary">
                                                {{ $errors->first('foto') }}
                                            </div>
                                            
                                            @if($equipo->foto)
                                                <div class="form-group m-b-10">
                                                    <img width="50%" alt="" src="{{ Storage::url($equipo->foto) }}" />
                                                </div>
                                            @endif
                                            
                                            
                                            <div class="form-group">
                                                <div>
                                                    <a href="{{ route('equipotrabajo.index') }}" class="btn btn-default waves-effect m-l-5" >
                                                    	Volver
                                                    </a>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Guardar
                                                    </button>
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