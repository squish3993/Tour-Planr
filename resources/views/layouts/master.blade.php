<!DOCTYPE html>
<html>
	<head>
		<title>
			@yield('title', 'Jakals Tour Planr')
		</title>

		<meta charset='utf-8'>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

       <link href="/css/app.css" type='text/css' rel='stylesheet'>
       @stack('head')
	</head>


	<body>
		<header>
            <div class='bigtitle container text-align:center'>   
                <h1> Jakals Tour Planr </h1>
           </div>
        </header>

        @include('modules.nav')

        <section id='sidebar' class=' flex-container col-sm-4'>
        	@yield('sidebar')
        </section>


         @if(session('alert'))
            <div class='alert'>
                {{ session('alert') }}
            </div>
        @endif

        <section id='map' class='flex-container col-sm-8'>
            @yield('map')
        </section>

        
        <script type="text/javascript" src="js/app.js"></script>
        <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/$VERSION/dragula.min.js'></script> -->
	</body>
  
</html>