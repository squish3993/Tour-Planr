@extends('layouts.master')

@section('sidebar')
	<h4>Unconfirmed Shows</h4>
	<ol>
		@for($i = 0; $i < $count; $i++)
		<li>{{ $unconfirmedshows[$i]['city'] }} 
			<a href='/ucshow/{{ $unconfirmedshows[$i]['id'] }}/delete'>Delete</a>
			<a href='/ucshow/{{ $unconfirmedshows[$i]["id"] }}/edit'>Edit</a>
			<ul>
				<li>{{ $unconfirmedshows[$i]['date'] }}</li>
				<li>{{ $unconfirmedshows[$i]['tier'] }}</li>
				@for($j = 0; $j < $countvenues[$i]; $j++)			
				<li>{{ $venues[$i][$j]['name'] }}</li>
					<ul>
						<li>{{ $venues[$i][$j]['address'] }}</li>
						<li>{{ $venues[$i][$j]['capacity'] }}</li>
						<li>{{ $venues[$i][$j]['booking'] }}</li>
					</ul>
				@endfor
			</ul>
		</li>
		@endfor
	</ol>


@endsection