@if(session()->has('message'))
	<div>
		<script type="text/javascript">
            window.onload = function() {
                alert('{{ session()->get('message') }}')
            }
		</script>
	</div>
@endif
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>LALa store login</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{URL::asset('auth/css/animate.css')}}">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="{{URL::asset('auth/css/style.css')}}">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
<div class="container">
	<div class="top">
		<h1 id="title" class="hidden"><span id="logo">LALA <span>Store</span></span></h1>
	</div>
	<div class="login-box animated fadeInUp">
		<div class="box-header">
			<h2>Log In</h2>
		</div>
		<form action="{{ route('login') }}" method="post">
			{{ csrf_field() }}
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="password">
			<br/>
			@if(session()->has('message'))
				<p>{{ session()->get('message') }}</p>
			@endif
			<button type="submit">Sign In</button>
			<br/>
		</form>
		<a href="/register"><p class="small">Don't have account?</p></a>
		<a href="#"><p class="small">Forgot your password?</p></a>
	</div>
</div>
</body>

<html lang="en"></html>