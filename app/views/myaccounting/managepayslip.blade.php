@extends('layout.master')
@section('header')
    <!-- <link rel="stylesheet" href="{{URL::to('packages/css/dashboard.css')}}"> -->
    <link rel="stylesheet" href="{{URL::to('packages/datepicker/css/datepicker.css')}}">
@stop

@section('body')
@include('layout.mainmenu')
<div class="col-md-3 center-block centerIt">
	{{Request::segment(2)}}
	{{  Form::open(['url' => 'test', 'files' => true, 'class' => '', 'role' => 'form']) }}

		<label for="rateType">Rate type</label>
		<select name="rateType" id="rateType" class="form-control">
			<option value="0">Hourly</option>
			<option value="1">Daily</option>
			<option value="2">Monthly</option>
		</select>
		
		<label for="fromDate">Date from</label>
		<input type="text" name="fromDate" class="form-control datepicker" readonly required="" />
		<label for="toDate">Date to</label>
		<input type="text" name="toDate" class="form-control datepicker" readonly required="" />
		<label for="company">Company name</label>
		<select name="company" id="company" class="form-control">
			@foreach($cs as $c)
			<option value="{{$c->companyid}}">{{$c->companyname}}</option>
			@endforeach
		</select>
		<label for="csvFile">Upload file</label>
		<input name="csvFile" type="file" id="csvFile" accept=".csv">
	<hr />
		{{ Form::submit('Upload Payslip',['class' => 'btn btn-block btn-primary']) }}
	{{ Form::close() }}
</div>

<script type="text/javascript">
$( document ).ready(function() {
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
  });
});
</script>
<script src="{{URL::to('/packages/datepicker/js/bootstrap-datepicker.js')}}"></script>
@stop