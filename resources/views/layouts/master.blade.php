<!DOCTYPE html>
<html>
	<head>
		<title>
			@yield('title', 'Jakals Tour Planr')
		</title>

		<meta charset='utf-8'>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

       <link href="/css/app.css" type='text/css' rel='stylesheet'>
       <link href="/css/dragula.css" type='text/css' rel='stylesheet'>
       @stack('head')
	</head>


	<body>
		<header>
            <div class='bigtitle container text-align:center'>   
                <h1> Jakals Tour Planr </h1>
           </div>
        </header>

        @include('modules.nav')

        <section id='sidebar' class=' flex-container col-sm-3'>
        	@yield('sidebar')
        </section>

        <section id='sidebar2' class=' flex-container col-sm-3'>
          @yield('sidebar2')
        </section>

         @if(session('alert'))
            <div class='alert'>
                {{ session('alert') }}
            </div>
        @endif

        <section id='map' class='flex-container col-sm-6'>
            @yield('map')
        </section>

        <section id='scripts'>
          @yield('scripts')
        </section>
        
        <script type="text/javascript" src="js/app.js"></script>
	</body>
  
</html>