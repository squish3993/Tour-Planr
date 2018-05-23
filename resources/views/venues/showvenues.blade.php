@extends('layouts.master')

@section('sidebar')
	<h4>Venues</h4>
	<ol>
		@foreach( $venues as $venue)
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
		@endforeach
	</ol>


@endsection