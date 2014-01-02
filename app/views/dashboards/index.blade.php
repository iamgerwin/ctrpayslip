@extends('layout.master')
@section('header')
    <link rel="stylesheet" href="{{URL::to('packages/css/dashboard.css')}}">
@stop

@section('body')
@include('layout.mainmenu')

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading" style="background-color:#bdc3c7;text-align:center">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Recent Announcements
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        
      	<div id="annPanel">

      	</div>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" style="background-color:#bdc3c7;text-align:center">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Recent Payslips
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        
      	<div id="payPanel">

      	</div>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" style="background-color:#bdc3c7;text-align:center">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Update Profile
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        
        <div id="proPanel">

        </div>

      </div>
    </div>
  </div>
</div>

@stop