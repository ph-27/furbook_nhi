@extends('layouts.master')

@section('header')
	<h2>Add new cat</h2>
@endsection

@section('content')
	{!! Form::open(['url' => 'cats']) !!}
	@include('partials.forms.cat')
	{!! Form::close() !!}
@endsection

