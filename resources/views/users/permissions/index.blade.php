@extends('theme.index')
@section('title') Permissions @stop
@section('bread-header') Permissions @stop
@section('bread-small') Permissions index @stop
@section('breadcrumb')
    <li class="active">
        <a href="/permissions">Permissions</a><!-- where -->
    </li>
@stop
@include('orders.partials.datatables-styles')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <br>

            <div class="box ">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-fw fa-list-ul"></i> Permission</h3>
                    <a href="/permissions/create" class="btn btn-sm btn-success pull-right">
                        <i class="fa fa-fw fa-plus"></i> New Permission</a>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                    <table cellspacing="0" width="100%" class="table table-bordered" id="table">
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
                        </tfoot>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    @include('orders.partials.datatables-scripts',
    [ 'cols' =>[
                    ['id'          , 10 ,  'id'],
                    ['name'        , 35 ,  'name'],
                ],
      'route' => 'permissions',
      'order' => 0,
      'sort_type' => 'asc'
    ]);
@stop
