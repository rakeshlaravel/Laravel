@extends('layouts.app')
<style type="text/css">
	td, th {
    padding-left: 10px!important;
}
</style>
@section('content')
<div><center><h2>List of Employee's Details</h2></center></div>
	<table>
		<tr>
			<th style="width: 5%">
				No.
			</th>
			<th style="width: 10%">
				Name
			</th>
			<th style="width: 10%">
				Emp Id
			</th>
			<th style="width: 20%">
				Address
			</th>
			<th style="width: 10%">
				Phone
			</th>
			<th style="width: 15%">
				Actions
			</th>
		</tr>
		</br>
		@foreach($result as $key=>$res)
			<tr>
				<?php $encKey = base64_encode(convert_uuencode($res->id)); ?>
				<td style="width: 5%">
				    {{ $key+1 }}
				</td>
				<td style="width: 10%">
					<input type="text" name="name" id="name_<?=$res->id?>" value="{{ $res->name }}"> 
				</td>
				<td style="width: 10%">
					<input type="text" name="emp_id" id="emp_id_<?=$res->id?>" value="{{ $res->emp_id }}">
				</td>
				<td style="width: 20%">
					<input type="text" style="width: 350;" name="address" id="address_<?=$res->id?>" value="{{ $res->address }}">
				</td>
				<td style="width: 10%">
					<input type="text" name="phone" id="phone_<?=$res->id?>" value="{{ $res->phone }}">
				</td>
				<td style="width: 15%">
					<a href="javascript:;" name="delete" id="delete_<?=$res->id?>">Delete</a>
					<!-- <a href="{{URL::asset('/employee/edit/'.$encKey)}}" name="edit" id="edit_<?=$res->id?>">Edit</a> -->
					<a href="javascript:;" name="edit" id="edit_<?=$res->id?>">Edit</a>
					<a href="javascript:;" data-toggle="modal" data-target="#myModal" name="view" id="view_<?=$res->id?>">View</a>
					<a href="javascript:;" name="save_<?=$res->id?>" id="submit">Save</a>
				</td>
			</tr>			
			</br>

		@endforeach
	</table>
	<div class="modal" id="myModal" role="dialog">
	    <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
				  	<button type="button" class="close" data-dismiss="modal">&times;</button>
				  	<h4 class="modal-title">Employee Details</h4>
				</div>
				<div class="modal-body">
				  	<table>
					  	<tr>
					  		<th>Name</th>					  	
					  		<td id="modal_name"></td>
					  	</tr>
					  	<tr>
					  		<th>Emp Id</th>
					  		<td id="modal_emp_id"></td>
					  	</tr>
					  	<tr>
					  		<th>Address</th>
					  		<td id="modal_address"></td>
					  	</tr>
					  	<tr>
					  		<th>Phone</th>
					  		<td id="modal_phone"></td>
					  	</tr>
				  	</table>				  	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
	    </div>
  </div>
@stop

	
