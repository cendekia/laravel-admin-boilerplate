<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <title>Admin Boilerplate</title>
	    <!-- Favicon-->
	    <link rel="icon" href="favicon.ico" type="image/x-icon">
	    <!-- Google Fonts -->
	    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	    <!-- Admin CSS -->
	    <link href="{{ elixir('css/admin-boilerplate.css', 'vendor/cendekia/laravel-admin-boilerplate/build') }}" rel="stylesheet">
	</head>

	<body class="theme-red">
		
		@include('viewBoiler::components.preloader')
	    <div class="overlay"></div>
	    @include('viewBoiler::components.top_navigation')

	    <section>
	        @include('viewBoiler::components.left_sidebar')
	        @include('viewBoiler::components.right_sidebar')
	    </section>

	    <section class="content">
	        @yield('content')
	    </section>

	    <!-- Plugin Js -->
	    <script src="{{ elixir('js/admin-boilerplate.js', 'vendor/cendekia/laravel-admin-boilerplate/build') }}"></script>
	    <!-- Custom Js -->
	    <script src="{{ elixir('js/admin-custom.js', 'vendor/cendekia/laravel-admin-boilerplate/build') }}"></script>
	    <script src="{{ elixir('js/admin-page-index.js', 'vendor/cendekia/laravel-admin-boilerplate/build') }}"></script>
	</body>
</html>