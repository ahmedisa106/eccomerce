@extends('admin.layouts.layout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/vendors/css/tables/datatable/datatables.min.css">


@endpush
@section('content_header')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">{{trans($title)}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{aurl()}}">@lang('admin.home')</a>
                    </li>

                    <li class="breadcrumb-item"><a href="#">{{trans($title)}}</a>
                    </li>

                </ol>
            </div>
        </div>
    </div>


@endsection
@section('content')


    <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">@lang('admin.admins')</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">


                                <table id="myTable" class="table table-striped table-bordered text-center">
                                    <thead>
                                    <tr>

                                        <th>{{trans('admin.name')}}</th>
                                        <th>{{trans('admin.email')}}</th>
                                        <th>{{trans('admin.operations')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>


                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->

    </div>


@endsection

@push('js')
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ],

                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "processing": true,
                "serverSide": true,

                "ajax": {
                    "url": "{{route('admins.dataTable')}}",
                    "type": "GET"
                },
                "columns": [
                    {data: 'name', name: name},
                    {data: 'email', name: 'email'},
                    {data: 'operations', name: 'operations', orderable: false, searchable: false}

                ],

                'language':{!! yajra_lang() !!}

            });
        });
    </script>
@endpush
