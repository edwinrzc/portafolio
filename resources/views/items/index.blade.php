@extends('main')

@section('contenido')

<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Administrador de Items</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-b-30 m-t-0">Items</h4>
                            <div class="row">
                                <div class="col-md-12 m-b-5">
                                	<a href="{{ route('items.create') }}" class="btn btn-primary">Nuevo Item</a>
                                	
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th width="15%"></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach( $items as $item)                                        
                                                <tr>
                                                    <td>{{ $item->item }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>                                                 	
                                                      	<a href="{{ route('items.edit', $item->id) }}" class="btn btn-default" >
                                                      		<i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                      	</a>
                                                      	<form id="delete_item_{{ $item->id }}" action="{{ route('items.destroy', $item->id) }}" style="display: inline;" method="POST">
                                                      		{!! csrf_field() !!}
                                                      		{!! method_field('DELETE') !!}
                                                      		<a href="" class="btn_delete_items btn btn-default" title="Eliminar Item" data-id="{{ $item->id }}" >
                                                      			<i class="fa fa-trash "></i>
                                                      		</a>                  		                   		                 		
                                                  		</form>
                                                    </td>
                                                </tr>
                                        	@endforeach                                        
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->



        </div><!-- container -->

    </div> <!-- Page content Wrapper -->

</div> <!-- content -->
@stop

@section('javascript')
	$(document).ready(function()
	{
		$('body').delegate('.btn_delete_items','click',function()
		{
			var id = $(this).attr('data-id');
			$('#delete_item_'+id).submit();
			return false;
		});
	});
@stop


