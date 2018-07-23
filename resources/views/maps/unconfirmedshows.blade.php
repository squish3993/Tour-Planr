@extends('layouts.master')

@push('head')
<style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 700px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       .extrainfo {
       	display: none;
       }
</style>
@endpush
@section('sidebar')
	<div>
		<h4>Unconfirmed Shows</h4>
		<ol id="left" class="list-group">
			@for($i = 0; $i < $count; $i++)
			<li id="show{{ $i }}" class="list-group-item">{{ $unconfirmedshows[$i]['city'] }} 
				<a href='/ucshow/{{ $unconfirmedshows[$i]['id'] }}/delete'>Delete</a>
				<a href='/ucshow/{{ $unconfirmedshows[$i]["id"] }}/edit'>Edit</a>
				<a href='/ucshow/{{ $unconfirmedshows[$i]["id"] }}/view'>View</a>
				<button id= "expandable{{ $i }}">Expand!</button>
				<ul id = "extrainfo{{ $i }}" class = "extrainfo">
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
	</div>
@endsection

@section('sidebar2')
	<div>
		<h4>Possible Route</h4>
		<ol id="right" class="list-group">
			<li class="list-group-item"></li>
		</ol>
	</div>
@endsection

@section('map')
<div id="map"></div>
	<script>
// Initialize and add the map
		function initMap() {
		  // The location of Uluru

		  var i
		  var center = {lat : 38.63, lng: -90.20}
		  var map = new google.maps.Map(   
		    document.getElementById('map'), {zoom: 5, center: center});
		  
		  for (i = 0; i < unconfirmedshowsjs.length; i++)
		  {
		  	var lat = unconfirmedshowsjs[i]['lat']
		  	var lng = unconfirmedshowsjs[i]['lng']

		  	var position = {lat: lat, lng: lng}
		  	var marker = new google.maps.Marker({position: position, map: map});
		  }
		  
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
@section('scripts')
<!-- CDNJS :: Vue (https://cdnjs.com/) -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.5.2/vue.min.js"></script>

	<!-- CDNJS :: Sortable (https://cdnjs.com/) -->
	<script src="//cdn.jsdelivr.net/npm/sortablejs@1.7.0/Sortable.min.js"></script>

	<!-- CDNJS :: Vue.Draggable (https://cdnjs.com/) -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.16.0/vuedraggable.min.js"></script>
	<script>
		for (let i = 0; i<unconfirmedshowsjs.length; i++){
			let y = i.toString();
			document.getElementById("expandable"+y).onclick = function(){
				var extrainfo = document.getElementById("extrainfo"+y);
				if (extrainfo.style.display == "block"){
					extrainfo.style.display = "none";
				}
				else {
					extrainfo.style.display = "block";
				}
			}
		}

		Sortable.create(right, {
			group: {
				name: 'right',
				put: ['left']
			},	
			animation: 150
		});

		// List with handle
		Sortable.create(left, {
			group: {
				name: 'left',
				put: ['right']
			},
			animation: 150	
		});

		

	</script>
@endsection

@include ('layouts/footer')