@extends('layouts.master')

@section('title')
	View Venue 
@endsection

@section('sidebar')
	<ol>
		<li>{{ $venue['name'] }} 
			<a href='/venues/{{ $venue["id"] }}/delete'>Delete</a>
			<a href='/venues/{{ $venue["id"] }}/edit'>Edit</a>
			<ul>
				<li>{{ $venue['city'] }}</li>
				<li>{{ $venue['address'] }}</li>
				<li>{{ $venue['capacity'] }}</li>
				<li>{{ $venue['booking'] }}</li>
			</ul>
		</li>
	</ol>
@endsection