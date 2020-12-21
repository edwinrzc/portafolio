@extends('main')

@section('contenido')
<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Actualizar Item</h4>
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
                                        <form class="" method="post" action="{{ route('items.update', $item->id) }}" >
                                        {!! method_field('PUT') !!}
                                        {!! csrf_field() !!}

                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="item" value="{{ $item->item }}" class="form-control" required placeholder="Nombre"/>
                                                {{ $errors->first('item') }}
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <div>
                                                    <textarea name="description" required class="form-control" rows="5">{{ $item->description  }}</textarea>
                                                    {{ $errors->first('description') }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Registrar
                                                    </button>
                                                    <a href="{{ route('items.index') }}" class="btn btn-default waves-effect m-l-5" >
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