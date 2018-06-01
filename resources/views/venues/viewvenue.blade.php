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

	<div class='text-center'>
		<h3>Add this Venue to an Unconfirmed show</h3>
		<h5>Select the show you want to add this venue too</h5>
		
	    <form method='POST' action='/venue/{{ $venue->id }}/add'>

	    	{{ method_field('put') }}

	        {{ csrf_field() }}


			<select name='ucshow' id='ucshow'>
				<option value='' selected='selected' disabled='disabled'>Choose a Show...</option>
				@foreach($unconfirmedshows as $unconfirmedshow)
					<option value='{{ $unconfirmedshow["id"] }}'>{{ $unconfirmedshow['city'] }} </option>
				@endforeach
			</select>
			<input type='submit' value='Add Venue to Show!' class='btn btn-primary btn-small'>
		</form>
	</div>
@endsection