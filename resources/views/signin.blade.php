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
	</head>

	<body class="login-page bg-{{ admin_theme('color') }}">
	    <div class="login-box">
	        <div class="logo">
	            <a href="javascript:void(0);">{!! config('admin.name') !!}</a>
	            <small>{!! config('admin.description') !!}</small>
	        </div>
	        <div class="card">
	            <div class="body">
	            	{!! Form::open(['id' => 'sign_in', 'url' => admin_url('signin'), 'method' => 'post']) !!}
	                    <div class="msg">Sign in to start your session</div>
	                    <div class="input-group">
	                        <span class="input-group-addon">
	                            <i class="material-icons">person</i>
	                        </span>
	                        <div class="form-line">
	                        	{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => true, 'autofocus' => true]) }}
	                        </div>
	                    </div>
	                    <div class="input-group">
	                        <span class="input-group-addon">
	                            <i class="material-icons">lock</i>
	                        </span>
	                        <div class="form-line">
	                        	{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true]) }}
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-xs-8 p-t-5">
	                            <input type="checkbox" name="remember" id="rememberme" class="filled-in chk-col-{{ admin_theme('color') }}">
	                            <label for="rememberme">Remember Me</label>
	                        </div>
	                        <div class="col-xs-4">
	                            <button class="btn btn-block bg-{{ admin_theme('color') }} waves-effect" type="submit">SIGN IN</button>
	                        </div>
	                    </div>
	                    <div class="row m-t-15 m-b--20">
	                        {{-- <div class="col-xs-6">
	                            <a href="sign-up.html">Register Now!</a>
	                        </div>
	                        <div class="col-xs-6 align-right">
	                            <a href="forgot-password.html">Forgot Password?</a>
	                        </div> --}}
	                    </div>
	                {!! Form::close() !!}
	            </div>
	        </div>
	    </div>

	    <!-- Plugin Js -->
	    <script src="{{ admin_elixir('js/admin-boilerplate.js') }}"></script>
	    <!-- Custom Js -->
	    <script src="{{ admin_elixir('js/admin-custom.js') }}"></script>
	    <script src="{{ admin_elixir('js/admin-page-index.js') }}"></script>
	</body>
</html>