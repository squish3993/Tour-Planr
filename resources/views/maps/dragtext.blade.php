@extends('layouts.master')

@section('sidebar')
	 <!-- Simple List -->
  <div id="simpleList" class="list-group">
    <div class="list-group-item">This is <a href="http://rubaxa.github.io/Sortable/">Sortable</a></div>
    <div class="list-group-item">It works with Bootstrap...</div>
    <div class="list-group-item">...out of the box.</div>
    <div class="list-group-item">It has support for touch devices.</div>
    <div class="list-group-item">Just drag some elements around.</div>
  </div>
  
  
  <!-- List with handle -->
  <div id="listWithHandle" class="list-group">
    <div class="list-group-item">
      <span class="badge">14</span>
      <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
      Drag me by the handle
    </div>
    <div class="list-group-item">
      <span class="badge">2</span>
      <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
      You can also select text
    </div>
    <div class="list-group-item">
      <span class="badge">1</span>
      <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
      Best of both worlds!
    </div>
  </div>
@endsection

@section('sidebar2')
	<div id='container2'>
		<ul id="dragspace">
			<li>foo</li>
		</ul>
	</div>
@endsection

@section('scripts')
<!-- CDNJS :: Vue (https://cdnjs.com/) -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.5.2/vue.min.js"></script>

	<!-- CDNJS :: Sortable (https://cdnjs.com/) -->
	<script src="//cdn.jsdelivr.net/npm/sortablejs@1.7.0/Sortable.min.js"></script>

	<!-- CDNJS :: Vue.Draggable (https://cdnjs.com/) -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.16.0/vuedraggable.min.js"></script>
	<script>
		// Simple list
		Sortable.create(simpleList, { /* options */ });

		// List with handle
		Sortable.create(listWithHandle, {
		  handle: '.glyphicon-move',
		  animation: 150
		});

	</script>
@endsection