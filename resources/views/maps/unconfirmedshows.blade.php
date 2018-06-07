@extends('layouts.master')

@push('head')
<style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 700px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
</style>
@endpush
@section('sidebar')
	<h4>Unconfirmed Shows</h4>
	<ol>
		@for($i = 0; $i < $count; $i++)
		<li>{{ $unconfirmedshows[$i]['city'] }} 
			<a href='/ucshow/{{ $unconfirmedshows[$i]['id'] }}/delete'>Delete</a>
			<a href='/ucshow/{{ $unconfirmedshows[$i]["id"] }}/edit'>Edit</a>
			<a href='/ucshow/{{ $unconfirmedshows[$i]["id"] }}/view'>View</a>
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

@section('map')
<div id="map"></div>
	<script>
// Initialize and add the map
		function initMap() {
		  // The location of Uluru

		  var lat = unconfirmedshowsjs[0]['lat']
		  var lng = unconfirmedshowsjs[0]['lng']

		  var nyc = {lat: lat, lng: lng}
		  // The map, centered at Uluru
		  var map = new google.maps.Map(
		      document.getElementById('map'), {zoom: 6, center: nyc});
		  // The marker, positioned at Uluru
		  var marker = new google.maps.Marker({position: nyc, map: map});
		}
	</script>
		    <!--Load the API from the specified URL
		    * The async attribute allows the browser to render the page while the API loads
		    * The key parameter will contain your own API key (which is not needed for this tutorial)
		    * The callback parameter executes the initMap() function
		    -->
		    <script async defer
		    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHOLzb1ePN--t0jhgAoTa4-uj-H8b_8qA&callback=initMap">
		   </script>
@endsection

@include ('layouts/footer')