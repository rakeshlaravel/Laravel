@extends('layouts.app')
@section('content')
	<?php if(isset($show) && !empty($show)) {	?>
		@if($show == "true")
			{{ "This is show function..." }}
			<h6><a href="{{URL::asset('/')}}">click here</a>{{ " to go Home" }}</h6>
			<h6 style="font-size: 30px;"><a href="{{URL::asset('/curd/create')}}">click here</a>{{ " to go Create" }}</h6>
			<h6 style="font-size: 20px;"><a href="{{URL::asset('/curd')}}">click here</a>{{ " to go Index" }}</h6>
		@endif
	<?php } ?>

	<?php if(isset($index) && !empty($index)) {	?>
		@if($index == "true")
			{{ "This is index function..." }}
			<h6><a href="{{URL::asset('/')}}">click here</a>{{ " to go Home" }}</h6>
			<h6 style="font-size: 30px;"><a href="{{URL::asset('/curd/create')}}">click here</a>{{ " to go Create" }}</h6>
			<h6 style="font-size: 20px;"><a href="{{URL::asset('/curd/show')}}">click here</a>{{ " to go Show" }}</h6>
		@endif
	<?php } ?>

	<?php if(isset($create) && !empty($create)) {	?>
		@if($create == "true")
			{{ "This is create function..." }}
			<h6><a href="{{URL::asset('/')}}">click here</a>{{ " to go Home" }}</h6>
			<h6 style="font-size: 30px;"><a href="{{URL::asset('/curd')}}">click here</a>{{ " to go Index" }}</h6>
			<h6 style="font-size: 20px;"><a href="{{URL::asset('/curd/show')}}">click here</a>{{ " to go Show" }}</h6>
		@endif
	<?php } ?>
@stop