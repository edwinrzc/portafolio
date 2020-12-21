@extends('main')

@section('contenido')

<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Administrador Logs</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-b-30 m-t-0">Logs de Sistema</h4>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Ruta</th>
                                                <th>Metodo</th>
                                                <th>Dirección Ip</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach( $logs as $value )                                        
                                                <tr>
                                                    <td>{{ $value->users->name }}</td>
                                                    <td>{{ $value->route }}</td>
                                                    <td>{{ $value->method }}</td>
                                                    <td>{{ $value->ip_address }}</td>
                                                    <td>{{ $value->getStateLog() }}</td>
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
