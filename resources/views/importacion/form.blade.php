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
                                        <form class="" method="post" action="{{ route('importacion.upload') }}" enctype="multipart/form-data" >
                                        {!! csrf_field() !!}

                                            
                                            <div class="form-group m-b-10">
                                                <p>Buscar Archivo</p>
                                                <input type="file" class="filestyle" name="filecsv" data-buttonname="btn-primary">
                                                {{ $errors->first('filecsv') }}
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <a href="{{ route('importacion.index') }}" class="btn btn-default waves-effect m-l-5" >
                                                    	Volver
                                                    </a>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Cargar
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