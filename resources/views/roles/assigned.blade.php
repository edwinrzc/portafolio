@extends('main')

@section('contenido')
<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Nuevo Role</h4>
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
                                        <form class="" method="post" action="{{ route('roles.register', $role->id) }}" >
                                        {!! method_field('PUT') !!}
                                        {!! csrf_field() !!}

                                            <div class="form-group">
                                                <label>{{ $role->name.' - '.$role->description }}</label>
                                                <div>
                                                	@foreach($items as $row )
                                                    <div class="checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox{{ $row->id }}" value="{{ $row->id }}" name="item[]"
                                                        	   {{ $role->items->pluck('id')->contains($row->id)? 'checked' : '' }}
                                                               data-parsley-multiple="groups" >
                                                        <label for="checkbox{{ $row->id }}"> {{ $row->item.' - '.$row->description }} </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <a href="{{ route('roles.index') }}" class="btn btn-default waves-effect m-l-5" >
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