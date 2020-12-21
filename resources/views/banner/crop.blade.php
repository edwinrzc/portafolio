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
                                        <form class="" method="post" action="{{ route('banner.cropsend', $banner->id) }}" >
                                        {!! method_field('PUT') !!}
                                        {!! csrf_field() !!}

                                            
                                            <div class="form-group" style="width:800px" >
                                               <img width="800" height="400" id="t3soeta" class="img-fluid mx-auto" src="{{ Storage::url($banner->imagen) }}" alt="">
                                            </div>

                                            
                                            <div class="form-group" >
                                            	<div id="preview" ></div>
                                            </div>
                                            
                                            <div style="clear:both"></div>
        
                                            <input type="hidden" name="x1" id="x1" value="">
                                            <input type="hidden" name="y1" id="y1" value="">
                                            <input type="hidden" name="width" id="width" value="">
                                            <input type="hidden" name="height" id="height" value="">
        
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
@section('javascript2')
<script src="{{ asset('/js/prototype.js') }}" type="text/javascript" ></script>
<script src="{{ asset('/js/scriptaculous.js?load=effects,builder,dragdrop') }}" type="text/javascript" ></script>
<script src="{{ asset('/js/cropper.js') }}" type="text/javascript" ></script>
<script src="{{ asset('/js/crop.js') }}" type="text/javascript" ></script>
@stop
