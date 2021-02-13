@extends('admin.layouts.layout')

@section('content_header')

@endsection
@section('content')
    {{auth('admin')->user()->name}}
@endsection
