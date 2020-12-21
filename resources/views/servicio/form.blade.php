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
                                        <form class="" method="post" action="{{ route('servicio.store') }}" enctype="multipart/form-data" >
                                        {!! csrf_field() !!}

                                            
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control" required placeholder="Titulo"/>
                                                {{ $errors->first('titulo') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea class="form-control" name="descripcion" required placeholder="Descripción" rows="5">{{ old('descripcion') }}</textarea>
                                                {{ $errors->first('descripcion') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Codigo Imagen</label>
                                                <input type="text" name="imagencode" value="{{ old('imagencode') }}" class="form-control" required placeholder="Codigo Imagen"/>
                                                {{ $errors->first('imagencode') }}
                                            </div>
                                            
                                            <div class="form-group m-b-10">
                                                <p>Imagen</p>
                                                <input type="file" class="filestyle" name="imagen" data-buttonname="btn-primary">
                                                {{ $errors->first('imagen') }}
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Estado</label>
                                                
												<select class="form-control" name="status" >
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                    <option value="2">Pausado</option>
                                                </select>
                                                {{ $errors->first('status') }}
                                            </div>
                                            
                                            <div class="form-group">
                                                <div>
                                                    <a href="{{ route('servicio.index') }}" class="btn btn-default waves-effect m-l-5" >
                                                    	Volver
                                                    </a>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Registrar
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