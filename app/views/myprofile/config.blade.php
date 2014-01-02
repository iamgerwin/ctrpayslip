@extends('layout.master')
@section('header')
    <link rel="stylesheet" href="{{URL::to('packages/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{URL::to('packages/datepicker/css/datepicker.css')}}">
@stop

@section('body')
@include('layout.mainmenu')
	
		<center><div id="statusConfig"></div></center>
		
<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Config Panel</h3>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Update Password</a></li>
                            <li><a href="#tab2" data-toggle="tab">Update Profile</a></li>
                            
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

  <div class="form-group well well-sm">
    <label for="oldPass">Old Password</label>
    <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="Enter Old Password" required="">
  </div>
  <div class="form-group">
    <label for="newPass">New Password</label>
    <input type="password" class="form-control" id="newPass" name="newPass" placeholder="Enter New Password" required="">
  </div>
  <div class="form-group">
    <label for="newPass2">Re-enter New Password</label>
    <input type="password" class="form-control" id="newPass2" name="newPass2" placeholder="Re-enter New Password" required="">
  </div>


  <button id="changePass" type="submit" class="btn btn-info">Submit</button>

                        </div>

<script type="text/javascript">

$( "#changePass" ).click(function() {
  data = {};
  data.oldPassword = $('#oldPass').val();
  data.newPassword = $('#newPass').val();
  data.checkPassword = $('#newPass2').val();

  $.ajax({
  	  type: "post",
  	  data: data,
	  url: "{{URL::to('/myProfile/updatepassword')}}",
	  beforeSend: function(){
	  		$('div#tab1').block({ 
                message: '<h3>Processing</h3>', 
                css: { border: '2px solid #000' } 
            }); 
	  },
	  context: document.body
	}).done(function(result) {
		$('div#tab1').unblock();
		$('div#statusConfig').html(result);
	});
});

</script>


                        <div class="tab-pane" id="tab2">
  <div class="form-group">
    <label for="username">Username <span class="label label-danger">*</span></label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="" value="{{$data['username']}}">
    <label for="firstname">Firstname <span class="label label-danger">*</span></label>
    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" required="" value="{{$data['firstname']}}">
    <label for="middlename">Middlename <span class="label label-danger">*</span></label>
    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename" required="" value="{{$data['middlename']}}">
    <label for="lastname">Lastname <span class="label label-danger">*</span></label>
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" required="" value="{{$data['lastname']}}">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="" value="{{$data['email']}}">
    <label for="mobilenumber">Mobile Number</label>
    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" required="" value="{{$data['mobile']}}">
    <label for="landline">Landline</label>
    <input type="text" class="form-control" id="landline" name="landline" placeholder="Landline" required="" value="{{$data['landline']}}">
    <label for="birthdate">Birthdate <span class="label label-danger">*</span></label>
    <div class="input-group">
    <input type="text" class="form-control datepicker" id="birthdate" name="birthdate" placeholder="Birthdate" readonly value="{{$data['birthdate']}}">
    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    <label for="employeenumber">Employee Number</label>
    <input type="text" class="form-control" id="employeenumber" name="employeenumber" placeholder="Employee Number" readonly value="{{$data->employeeid}}">
    <label for="usertype">Usertype</label>
    <input type="text" class="form-control" id="usertype" name="usertype" placeholder="usertype" readonly value="{{$data->usertype->usertypename}}">
    <label for="companyname">Company Name</label>
    <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Company Name" readonly value="{{$data->company->companyname}}">
  </div>
    <button id="updateProf" type="submit" class="btn btn-info">Submit</button>
                        </div>
<script type="text/javascript">
$( document ).ready(function() {
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
  });
});

$( "#updateProf" ).click(function() {
  dataProf = {};
  dataProf.username = $('#username').val();
  dataProf.firstname = $('#firstname').val();
  dataProf.lastname = $('#lastname').val();
  dataProf.middlename = $('#middlename').val();
  dataProf.email = $('#email').val();
  dataProf.mobilenumber = $('#mobilenumber').val();
  dataProf.landline = $('#landline').val();
  dataProf.birthdate = $('#birthdate').val();

  $.ajax({
  	  type: "post",
  	  data: dataProf,
	  url: "{{URL::to('/myProfile/updateprofile')}}",
	  beforeSend: function(){
	  		$('div#tab2').block({ 
                message: '<h3>Processing</h3>', 
                css: { border: '2px solid #000' } 
            }); 
	  },
	  context: document.body
	}).done(function(result) {
		$('div#tab2').unblock();
		$('div#statusConfig').html(result);
	});
});
</script>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<script src="{{URL::to('/packages/datepicker/js/bootstrap-datepicker.js')}}"></script>
@stop