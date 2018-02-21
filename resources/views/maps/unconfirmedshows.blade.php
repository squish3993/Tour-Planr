@extends('layouts.master')

@section('sidebar')
	<ol>
		@foreach($unconfirmedshows as $unconfirmedshow)
		<li>{{ $unconfirmedshow['city'] }}
			<ul>
				<li>{{ $unconfirmedshow['date'] }}</li>
				<li>{{ $unconfirmedshow['tier'] }}</li>
			</ul>
		</li>
		@endforeach
	</ol>


@endsection