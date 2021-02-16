@extends('admin.layouts.layout')
@section('content_header')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">{{trans($title)}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{aurl()}}">@lang('admin.home')</a></li>

                    <li class="breadcrumb-item"><a href="{{aurl('users')}}">{{trans('admin.users')}}</a></li>
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

                            <div class="card-body card-dashboard">
                                <form class="form-horizontal" novalidate method="post" action="{{aurl('settings')}}" enctype="multipart/form-data">
                                    {{method_field('put')}}
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <h4>@lang('admin.name_ar')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <input type="text" name="name_ar" value="{{$setting->name_ar}}" class="form-control" required data-validation-required-message="{{trans('admin.name_ar_required')}}">
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <h4>@lang('admin.name_en')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <input type="text" name="name_en" value="{{$setting->name_en}}" class="form-control" required data-validation-required-message="{{trans('admin.name_en_required')}}">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <h4>@lang('admin.email')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <input type="email" name="email" value="{{$setting->email}}" class="form-control" required data-validation-required-message="{{trans('admin.email_required')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h4>@lang('admin.site_logo')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <input type="file" name="logo" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h4>@lang('admin.site_icon')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <input type="file" name="icon" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h4>@lang('admin.site_desc')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <textarea name="description" id="description" cols="190" rows="10">{{$setting->description}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h4>@lang('admin.site_keywords')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <textarea name="keywords" id="keywords" cols="190" rows="10">{{$setting->keywords}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h4>@lang('admin.default_lang')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <select class="form-control" name="language" id="language">
                                                        <option value="arabic" {{$setting->language=='arabic'?'selected':''}}>@lang('admin.arabic')</option>
                                                        <option value="english" {{$setting->language=='english'?'selected':''}}>@lang('admin.english')</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h4>@lang('admin.site_status')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <select class="form-control" name="status" id="language">
                                                        <option value="open" {{$setting->status=='open'?'selected':''}}>@lang('admin.open')</option>
                                                        <option value="close" {{$setting->status=='close'?'selected':''}}>@lang('admin.close')</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h4>@lang('admin.site_message')
                                                    <span class="required">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <textarea name="message" id="message" cols="190" rows="10">{{$setting->message}}</textarea>
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
