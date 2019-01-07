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
                                        <form class="" method="post" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data" >
                                        {!! method_field('PUT') !!}
                                        {!! csrf_field() !!}

                                            
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" name="titulo" value="{{ $banner->titulo }}" class="form-control" required placeholder="Titulo"/>
                                                {{ $errors->first('titulo') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Sub Titulo</label>
                                                <input type="text" name="subtitulo" value="{{ $banner->subtitulo }}" class="form-control" required placeholder="Sub Titulo"/>
                                                {{ $errors->first('subtitulo') }}
                                            </div>

                                            <div class="form-group">
                                                <label>Titulo Botón</label>
                                                <input type="text" name="tituloboton" value="{{ $banner->tituloboton }}" class="form-control" required placeholder="Titulo Botón"/>
                                                {{ $errors->first('tituloboton') }}
                                            </div>
                                            
                                            <div class="form-group m-b-10">
                                                <p>Imagen</p>
                                                <input type="file" class="filestyle" name="imagen" data-buttonname="btn-primary">
                                                {{ $errors->first('imagen') }}
                                            </div>
                                            
                                            @if($banner->imagen)
                                                <div class="form-group m-b-10">
                                                    <img width="50%" alt="" src="{{ Storage::url($banner->imagen) }}" />
                                                </div>
                                            @endif
                                            
                                            <div class="form-group">
                                                <div>
                                                    <a href="{{ route('banner.index') }}" class="btn btn-default waves-effect m-l-5" >
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