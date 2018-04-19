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
			</ul>
		</li>
	</ol>
@endsection