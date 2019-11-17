
<!doctype html>
<html lang="en">

	<head>

	 	@include('partials._head')

	</head>  

	<body>

		<div class="container">

			@include('partials._nav')

			@include('partials._messages')

			@yield('content')

		</div>
	      
		@include('partials._footer')

		@include('partials._javascript')

		@yield('scripts')

	</body>

</html>

