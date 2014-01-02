@extends('layout.master')
@section('header')
    <link rel="stylesheet" href="{{URL::to('packages/jtable/themes/metro/red/jtable.css')}}">
    <script src="{{URL::to('packages/jtable/jquery.jtable.js')}}"></script>
@stop

@section('body')
@include('layout.mainmenu')
<div class="col-md-10 centerIt">
	<div style="margin:10px;">
		<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModal">Add New Client</button>
	</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Client</h4>
      </div>
      <div class="modal-body">
        	
        		<label for="newName">Name:</label><input id="newName" name="newName" type="text" class="form-control" placeholder="Name">
        		<label for="newSname">Shortname:</label><input id="newSname" name="newSname" type="text" class="form-control" placeholder="Short name">
        		<label for="newAddress">Address:</label><input id="newAddress" name="newAddress" type="text" class="form-control" placeholder="Address">
        		<label for="newContact">Contact:</label><input id="newContact" name="newContact" type="text" class="form-control" placeholder="Contact">
        		<br />
        		<label for="newActive">Active: <input id="newActive" name="newActive" type="checkbox" checked></label>
        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="submitNew" type="button" class="btn btn-primary">Save</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


	<table id="companyTable" class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Alias</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Active</th>
				<th>Logo</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $i = 0; ?>
		@foreach($companies as $company)
		<tr>
			<td><input id="name{{$i}}" name="name{{$i}}" type="text" class="form-control" value="{{$company->companyname}}" /></td>
			<td><input id="sname{{$i}}" name="sname{{$i}}" type="text" class="form-control" value="{{$company->shortname}}" /></td>
			<td><input id="address{{$i}}" name="address{{$i}}" type="text" class="form-control" value="{{$company->address}}" /></td>
			<td><input id="address{{$i}}" name="address{{$i}}" type="text" class="form-control" value="{{$company->contactno}}" /></td>
			<td> <input id="active{{$i}}" name="active{{$i}}" type="checkbox" @if($company->isdeleted == 0) checked @endif >
			</td>
			<td>logo</td>
			<td><button id="update{{$i}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span></button></td>
		</tr>
		<?php $i++; ?>
		@endforeach
		</tbody>
	</table>
</div>

<script type="text/javascript">

    $(document).ready(function() {
    	$('#companyTable').dataTable();
    	$('#submitNew').click(function() {
    		var obj = {};
    		obj.Name = $('input#newName').val();
			obj.Shortname = $('input#newSname').val();
			obj.Address = $('input#newAddress').val();
			obj.Contact = $('input#newContact').val();
			obj.Active = $('input#newActive').is(':checked') ? 0 : 1;

			$.ajax({
			  	  type: "post",
			  	  data: obj,
				  url: "{{URL::to('api/company')}}",
				  beforeSend: function(){
				  		$('div.modal-body').block({ 
			                message: '<h3>Processing</h3>', 
			                css: { border: '2px solid #000' } 
			            }); 
				  },
				  context: document.body
				}).done(function(result) {
					$('div.modal-body').unblock();
					$('div#statusConfig').html(result);
				});
    	});
    });
</script>
@stop