@extends('layouts.master')

@section('title')
	View Show 
@endsection

@section('sidebar')
	<ol>
		<li>{{ $show['city'] }} 
			<a href='/ucshow/{{ $show["id"] }}/delete'>Delete</a>
			<a href='/ucshow/{{ $show["id"] }}/edit'>Edit</a>
			<ul>
				<li>{{ $show['date'] }}</li>
				<li>{{ $show['tier'] }}</li>
				<li>Venues:
					<ol>
						@foreach ($show->venues as $venue)
						<li>
							{{ $venue['name'] }} 
							<a href='{{ $venue["id"] }}/remove'>Remove</a>
						</li>
						@endforeach
					</ol>
				</li>					
			</ul>
		</li>
	</ol>
	<div class='text-center'>
		<h3>Add a Possible Venue!</h3>
		<h5>Select the Venue you want to add</h5>
		
	    <form method='POST' action='/ucshow/{{ $show->id }}/add'>

	    	{{ method_field('put') }}

	        {{ csrf_field() }}


			<select name='venue' id='venue'>
				<option value='' selected='selected' disabled='disabled'>Choose a Venue...</option>
				@foreach($venues as $venue)
					<option value='{{ $venue["id"] }}'>{{ $venue['name'] }}, {{ $venue['city'] }} </option>
				@endforeach
			</select>
			<input type='submit' value='Add Venue!' class='btn btn-primary btn-small'>
		</form>
	</div>
			
@endsection