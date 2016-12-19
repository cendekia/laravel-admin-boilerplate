<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <title>Laravel Admin Boilerplate</title>
	    <!-- Favicon-->
	    <link rel="icon" href="favicon.ico" type="image/x-icon">
	    <!-- Google Fonts -->
	    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	    <!-- Admin CSS -->
	    <link href="{{ admin_elixir('css/admin-boilerplate.css') }}" rel="stylesheet">
	   	@stack('custom_css')
	</head>

	<body class="theme-{{ admin_theme('color') }}">
		
		@include('admin-view::components.preloader')
	    <div class="overlay"></div>
	    @include('admin-view::components.top_navigation')

	    <section>
	        @include('admin-view::components.left_sidebar')
	        @include('admin-view::components.right_sidebar')
	    </section>

	    <section class="content">
	        @yield('content')
	    </section>

	    <!-- Plugin Js -->
	    <script src="{{ admin_elixir('js/admin-boilerplate.js') }}"></script>
	    
	    <!-- Custom Js -->
	    <script src="{{ admin_elixir('js/admin-custom.js') }}"></script>

	    @stack('custom_js')
	</body>
</html>