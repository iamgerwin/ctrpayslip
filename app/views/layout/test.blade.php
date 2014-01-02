@extends('layout.master')
@section('header')
    <link rel="stylesheet" href="{{URL::to('packages/css/dashboard.css')}}">
@stop

@section('body')
@include('layout.mainmenu')

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<div id="divHere"></div>
{{  Form::open(array('url' => 'test', 'files' => true)) }}
	{{ Form::file('csvFile') }}
	{{ Form::submit() }}
{{ Form::close() }}
@stop