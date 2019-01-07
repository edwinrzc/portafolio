@extends('main')

@section('contenido')
<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Cargar Archivo de Deudas</h4>
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
                                        <form class="" method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data" >
                                        {!! csrf_field() !!}

                                            
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control" required placeholder="Titulo"/>
                                                {{ $errors->first('titulo') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Sub Titulo</label>
                                                <input type="text" name="subtitulo" value="{{ old('subtitulo') }}" class="form-control" required placeholder="Sub Titulo"/>
                                                {{ $errors->first('subtitulo') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Titulo Botón</label>
                                                <input type="text" name="tituloboton" value="{{ old('tituloboton') }}" class="form-control" required placeholder="Titulo Botón"/>
                                                {{ $errors->first('tituloboton') }}
                                            </div>
                                            
                                            <div class="form-group m-b-10">
                                                <p>Imagen</p>
                                                <input type="file" class="filestyle" name="imagen" data-buttonname="btn-primary">
                                                {{ $errors->first('imagen') }}
                                            </div>
                                            
                                            <div class="form-group">
                                                <div>
                                                    <a href="{{ route('banner.index') }}" class="btn btn-default waves-effect m-l-5" >
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