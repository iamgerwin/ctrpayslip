@extends('layout.master')
@section('header')
    <link rel="stylesheet" href="{{URL::to('packages/css/dashboard.css')}}">
@stop

@section('body')
@include('layout.mainmenu')

<div class="col-md-4 centerIt">
	 <table id="" class="table table-hover ">
	 	<thead>
	 		<tr>
	 			<th><center>List of Payslip</center></th>
	 		</tr>
	 	</thead>
    <?php $i = 0; ?>
	  @foreach($list as $d)
	  	<tr>
	  		<td><center>
	  			<b> <button class="btn btn-success" data-toggle="modal" data-target="#myModal{{$i}}">
  {{$d->datestarting}} - {{$d->dateending}}
</button>  </b> <br />
	  			<span class="label label-info">{{$d->company->companyname}}</span>
	  			<span class="label label-warning">{{$d->creator->lastname}}, {{$d->creator->firstname}}</span>
	  		</center></td>
<script type="text/javascript">
$( document ).ready(function() {
  $('#myModal{{$i}}').on('show.bs.modal', function () {
    
    $.ajax({
    url: "{{URL::to('api/payslip/')}}/{{$d->uploadid}}",
    beforeSend: function() {
            $('.modal-body').block({ 
                message: '<h3><img src="{{URL::to('/packages/img/load.gif')}}"></h3>', 
                css: { border: '2px solid #000' } 
            }); 
      }
    })
    .done(function( data ) {
      $('.modal-body').unblock();
      $('.modal-body').html(data);
    });
  });
});
</script>
	  	</tr>
<div class="modal fade myModal" id="myModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div id="modal-body" class="modal-body centerIt"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      <?php $i++; ?>
	  @endforeach
	 </table>
</div>



@stop