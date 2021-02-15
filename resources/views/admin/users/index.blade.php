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

    @include('admin.includes.message')
    <div class="content-body">


        <!-- Zero configuration table -->
        <section id="configuration">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">@lang('admin.users')</h4>
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
                            <div class="card-header">

                                <div class="form-group">
                                    <select class="form-control" name="level" id="level">
                                        <option value="">.......</option>
                                        <option value="">@lang('admin.user')</option>
                                        <option value="">@lang('admin.vendor')</option>
                                        <option value="">@lang('admin.company')</option>
                                    </select>
                                </div>

                                <h4 class="card-title btn btn-danger DelBtn pull-right" onclick="deleteAll()"><i class="fa fa-trash"></i> @lang('admin.delete_all')</h4>
                                <br>

                                <a href="{{aurl('users/create')}}"><h4 class="card-title btn btn-success  pull-left"><i class="fa fa-plus"></i> @lang('admin.users_addNew') </h4></a>
                            </div>
                            <div class="card-body card-dashboard">

                                <form action="{{aurl('users/destroy/all')}}" id="form_data" method="post">

                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <table id="myTable" class="table table-striped table-bordered text-center">
                                        <thead>
                                        <tr>

                                            <th>
                                                <label for="check_all"> @lang('admin.check_all')</label> <input type="checkbox" id="check_all" class="check_all">
                                            </th>
                                            <th>{{trans('admin.name')}}</th>
                                            <th>{{trans('admin.email')}}</th>
                                            <th>{{trans('admin.level')}}</th>
                                            <th>{{trans('admin.operations')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>


                                    </table>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->

    </div>



    {{--    <!-- Button trigger modal -->--}}
    {{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MultipleDelete">--}}
    {{--        Launch demo modal--}}
    {{--    </button>--}}

    <!-- Modal -->
    <div class="modal fade" id="MultipleDelete" tabindex="-1" role="dialog" aria-labelledby="MultipleDelete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">@lang('admin.delete_all')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center not_empty_record hidden ">
                    @lang('admin.deleteTxt') <span class="item_count"></span>
                </div>

                <div class="modal-body text-center empty_record hidden">
                    @lang('admin.selectSomeRecords')
                </div>

                <div class="modal-footer empty_record hidden">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('admin.yup')</button>
                </div>

                <div class="modal-footer not_empty_record hidden">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('admin.no')</button>
                    <button type="button" name="del_ll" class="btn btn-danger del_all">@lang('admin.yes')</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <!-- Start Buttons for DataTAble -->

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <!-- End Buttons for DataTAble-->

    <script>

        $(document).ready(function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {extend: 'copy', text: '@lang('admin.copy') <i class="fa fa-copy"></i> ', className: 'btn btn-primary '},
                    {extend: 'excel', text: '@lang('admin.excel') <i class="fa fa-file"></i>', className: 'btn btn-success '},
                    {extend: 'print', text: '@lang('admin.print') <i class="fa fa-print"></i>  ', className: 'btn btn-default '},

                ],

                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "processing": true,
                "serverSide": true,

                "ajax": {
                    "url": "{{route('users.dataTable')}}",
                    "type": "get",
                    "data": {
                        'level': '{{$level}}'
                    }

                },
                "columns":
                    [
                        {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false, sortable: false},
                        {data: 'name', name: name},
                        {data: 'email', name: 'email'},
                        {data: 'level', name: 'level'},
                        {data: 'operations', name: 'operations', orderable: false, searchable: false}
                    ],

                'language':{!! yajra_lang() !!}

            });
        })
        ;
    </script>


    <script type="text/javascript">

        $('#level').on('change', function () {


        })
    </script>



@endpush
