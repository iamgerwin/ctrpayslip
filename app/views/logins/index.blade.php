@extends('layout.master')

@section('header')
	<link rel="stylesheet" href="{{URL::to('packages/css/login.css')}}">
@stop

@section('body')
	<style type="text/css">
	.fullscreen_bg
	{
		background-image: url("{{URL::to('packages/img/back-login.jpg')}}");
	}
	</style>
<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">


		{{Form::open(['url' => 'login', 'class' => 'form-signin','method' => 'post'])}}
			<h1 class="form-signin-heading text-muted"><img src="http://ctrphils.com/2013_LOGO/MainLogo2013.png"   alt="Customer Touchpoint Resources, Inc." /></h1>

		@if(isset($msg))
			<div class="alert alert-dismissable alert-warning">
				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>
					{{$msg}}
				</h4> <strong></strong> 
			</div>
		@endif

			<input type="text" name="username" id="username" class="form-control" placeholder="Username" required="" autofocus="">

			<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">

			{{Form::submit('Log in',['class' => 'btn btn-lg btn-primary btn-block', 'data-toggle-text' => 'Processing...'])}}
		{{Form::close()}}


</div>



@stop

@section('footer')

@stop