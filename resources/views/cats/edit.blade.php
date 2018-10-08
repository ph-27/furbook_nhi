@extends('layouts.master')

@section('header')
	<h2>Edit a cat</h2>
@endsection

@section('content')
	{!! Form::model($cat, ['url' => '/cats/'. $cat -> id, 'method' => 'PUT']) !!}
	@include('partials.forms.cat')
	{!! Form::close() !!}
@endsection