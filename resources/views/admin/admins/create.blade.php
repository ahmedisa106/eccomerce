@extends('admin.layouts.layout')
@section('content_header')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">{{trans($title)}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{aurl()}}">@lang('admin.home')</a></li>

                    <li class="breadcrumb-item"><a href="{{aurl('admins')}}">{{trans('admin.admins')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{trans($title)}}</a></li>

                </ol>
            </div>
        </div>
    </div>


@endsection
@section('content')

    @include('admin.includes.message')
    <div class="content-body">
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
                                <form class="form-horizontal" novalidate method="post" action="{{aurl('admins')}}">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <h4>@lang('admin.name')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" required data-validation-required-message="{{trans('admin.name_required')}}">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <h4>@lang('admin.email')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" required data-validation-required-message="{{trans('admin.email_required')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h4>@lang('admin.password')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <input type="password" name="password" class="form-control" required data-validation-required-message="{{trans('admin.password_required')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h4>@lang('admin.repeat_password')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <input type="password" name="password_confirmation" data-validation-match-match="password" class="form-control" required>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success">@lang('admin.submit') <i class="la la-thumbs-o-up position-right"></i></button>
                                                <button type="reset" class="btn btn-danger">@lang('admin.restore') <i class="la la-refresh position-right"></i></button>
                                            </div>

                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
