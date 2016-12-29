@extends('admin-view::layouts.master')

@push('custom_css')
    <link href="{{ admin_asset('css/dataTables.css')}}" rel="stylesheet">
@endpush

@push('custom_js')
    <script src="{{ admin_asset('js/dataTables.js')}}"></script>
@endpush

@section('content')

    {{-- @include('admin.layouts.error_and_message') --}}

    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @if ($actionButtons['create'] && in_array('create', $actionAllowed))
                    <a href="{{ $url . '/create' }}" class="btn btn-primary">Add new</a>
                @endif
            </h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ ucwords($pageTitle) }}
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <table id="{{ str_slug($pageTitle) }}" class="table table-bordered table-striped table-hover dataTable">
                            <thead>
                                <tr>
                                    @foreach($datatableColumns as $column)
                                        <th style="{{ ($column['data'] == 'action') ? 'width:65px' : '' }}">{{ strtoupper(str_replace('_', ' ', $column['data'])) }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            {{-- <tfoot>
                                <tr>
                                    @foreach($datatableColumns as $column)
                                        <th style="{{ ($column['data'] == 'action') ? 'width:65px' : '' }}">{{ strtoupper(str_replace('_', ' ', $column['data'])) }}</th>
                                    @endforeach
                                </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('custom_js')
    <script>
        var datatable_columns = {!! json_encode($datatableColumns) !!};
        $(function() {
            $('#' + '{{ str_slug($pageTitle) }}').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! $url . '/ajax' !!}',
                columns: datatable_columns,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endpush
