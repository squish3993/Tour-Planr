@extends('layouts.master')

@section('sidebar')
	<h4>Venues</h4>
	<ol>
		@foreach( $venues as $venue)
		<li>{{ $venue['name'] }} 
			<ul>
				<li>{{ $venue['name'] }}</li>
				<li>{{ $venue['address'] }}</li>			
				<li>{{ $venue['capacity'] }}</li>
				<li>{{ $venue['booking'] }}</li>
			</ul>
		</li>
		@endforeach
	</ol>


@endsection