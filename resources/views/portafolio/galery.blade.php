@extends('main')

@section('contenido')

<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
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
                                <div class="col-sm-12 col-xs-12">

                                    <div class="m-t-20">
                                    
                                    	<!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                          Agregar Imagen
                                        </button>
                                        <a href="{{ route('portafolio.index') }}" class="btn btn-default waves-effect m-l-5" >
                                        	Volver
                                        </a>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Cargar Imagenes</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <form id="form-upload" class="dropzone" method="post" action="" >
                                                  {!! csrf_field() !!}
        										  <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                  </div>
                                                </form>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- Grid row -->
                                    <div class="row m-t-20">
                                    
                                      @foreach($galerys as $galery)
                                      <!-- Grid column -->
                                      <div class="col-lg-4 col-md-12 mb-4 m-b-10">
                                    
                                        <!--Modal: Name-->
                                        <div class="modal fade" id="modal-{{ $galery->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg" role="document">
                                    
                                            <!--Content-->
                                            <div class="modal-content">
                                    
                                              <!--Body-->
                                              <div class="modal-body mb-0 p-0">
                                    
                                                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">                                                    
                                                    <figure class="col-md-4">
                                                        <img alt="picture" src="{{ Storage::url($galery->imagen()) }}" class="img-fluid" />                                                        
                                                    </figure>
                                                </div>
                                    			
                                              </div>
                                    		  
                                              <!--Footer-->
                                              <div class="modal-footer justify-content-center">
                                              
                                              	<div class="col-md-8">
                                              		<form id="form-titulo-{{$galery->id}}" class="form-inline right" method="post"  >
                                                      {!! csrf_field() !!}
            										  
            										  <div class="form-group">
                                                        <label for="titulo">Titulo:</label>
                                                        <input type="text" autocomplete="false" class="form-control" id="titulo" name="titulo" value="{{ old('titulo',$galery->titulo) }}">
                                                      </div>
                                                      <button type="button" data-id="{{$galery->id}}" 
                                                      data-action="U" data-url="{{ route('portafolio.galery.title', $galery->id) }}" 
                                                      class="btn btn-success btn-save btn-rounded btn-md ml-4" >Guardar</button>
                                                      <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-0" data-id="{{$galery->id}}" data-action="U" data-dismiss="modal">Close</button>
                                                    </form>
                                                    <form id="delete_item_" style="display: inline;" method="POST">
                                                  		{!! csrf_field() !!}
                                                  		{!! method_field('DELETE') !!}
                                                  		<a href="" class="btn_delete_items btn btn-default" title="Eliminar Item" data-id="" >
                                                  			<i class="fa fa-trash "></i>
                                                  		</a>                  		                   		                 		
                                              		</form>
                                              	</div>
                                    
                                              </div>
                                    
                                            </div>
                                            <!--/.Content-->
                                    
                                          </div>
                                        </div>
                                        
                                        <!--Modal: Name-->
                                    
                                        <a>
                                        	<figure class="col-md-8">
                                        		<img class="img-fluid z-depth-1" width="100%" src="{{ Storage::url($galery->imagen()) }}" alt="video"
                                            data-toggle="modal" data-target="#modal-{{ $galery->id}}">
                                        	</figure>
                                        	
                                        </a>
                                    	
                                    	<form id="delete_item_{{ $galery->id }}" style="display: inline;" method="POST">
                                      		{!! csrf_field() !!}
                                      		{!! method_field('DELETE') !!}
                                      		<button type="button" class="btn btn-danger btn-rounded btn-md ml-0" data-url="{{ route('portafolio.galery.delete', $galery->id) }}" data-id="{{$galery->id}}" data-action="D" data-dismiss="modal">
                                      			Eliminar
                                      		</button>                		                   		                 		
                                  		</form>
                                      </div>
                                      <!-- Grid column -->
                                      @endforeach
                                      
                                    
                                    </div>
                                    <!-- Grid row -->
                                    

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
<script src="{{ asset('/js/dropzone/dist/dropzone.js') }}"></script>
<script type="text/javascript">

    var myDropzone = new Dropzone("#form-upload", {
        // Setup chunking
        chunking: true,
        method: "POST",
        maxFilesize: 400000000,
        chunkSize: 1000000,
        // If true, the individual chunks of a file are being uploaded simultaneously.
        parallelChunkUploads: true,
        _token: $('[name=_token]').val(),
        url: "{{ route('portafolio.galeryUpload', $id) }}"
    });
    
    $("#exampleModalCenter").on("hidden.bs.modal", function () {
        location.reload();
    });


    


    $('.btn-danger').click(function(event){	    

	    var id = $(this).attr('data-id');
	    var url = $(this).attr('data-url');
	    var data = $('#delete_item_'+id).serialize();

	    if(typeof($(this).attr('data-action')) != 'undefined')
		{

    		bootbox.confirm({
    		    message: "Esta seguro que desea eliminar la imagen?",
    		    buttons: {
    		        confirm: {
    		            label: 'Si',
    		            className: 'btn-success'
    		        },
    		        cancel: {
    		            label: 'No',
    		            className: 'btn-danger'
    		        }
    		    },
    		    callback: function (result) {

					if(result)
					{
					    $.ajax({
	        				url: url,
	        				type: 'DELETE',
	        				data: data,
	        				dataType: 'json',
	        				success: function(_resp)
	        				{
	        					if(!_resp.error)
	        					{
	        					    bootbox.alert({
	        						    message: "Se ha completado la accion.",
	        						    callback: function () {
	        						        location.reload();
	        						    }
	        						});
	        					}
	        					else
	        					{
	        					    bootbox.alert({
	        						    message: _resp.message
	        						});
	        					}
	        				}
	        			});
					}
						
    		    }
    		});
		
			
		}
	});


	$('.btn-save').click(function(event){	    

	    var id = $(this).attr('data-id');
	    var url = $(this).attr('data-url');
	    var data = $('#form-titulo-'+id).serialize();

	    if(typeof($(this).attr('data-action')) != 'undefined')
		{
			$.ajax({
				url: url,
				type: 'PUT',
				data: data,
				dataType: 'json',
				success: function(_resp)
				{
					if(!_resp.error)
					{
					    bootbox.alert({
						    message: "Se ha completado la accion.",
						    callback: function () {
						        location.reload();
						    }
						});
					}
					else
					{
					    bootbox.alert({
						    message: _resp.message
						});
					}
				}
			});
		}
	});


// Append token to the request - required for web routes
/*myDropzone.on('sending', function (file, xhr, formData) {
    formData.append("_token", $('[name=_token]').val());
})*/
</script>
@stop
