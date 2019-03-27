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
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>LaLa store register</title>
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{URL::asset('auth/css/animate.css')}}">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="{{URL::asset('auth/css/style.css')}}">
	<script src="{{ URL::asset('auth/js/main.js') }}"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">LALA <span>Store</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Register</h2>
			</div>
			<form action="{{route('register')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<label for="username">Username</label>
				<br/>
				<input type="text" id="username" name="username" required>
				@if ($errors->has('username'))
				    <div class="error">{{ $errors->first('username') }}</div> <br/>
				@endif
				<br/>
				<label for="password">Password</label>
				<br/>
				<input type="password" id="password" name="password" required onchange ='check()';>
				<br/>
				@if ($errors->has('password'))
					<div class="error">{{ $errors->first('password') }}</div> <br/>
				@endif
				<label for="repassword">Confirm Password</label>
				<br/>
				<input type="password" id="repassword" name="repassword" required onchange ='check()';>
				<br/>
				<span id='message'></span>
				<br/>
				<label for="name">Name</label>
				<br/>
				<input type="text" id="name" name="name" required>
				<br/>
				@if ($errors->has('name'))
					<div class="error">{{ $errors->first('name') }}</div> <br/>
				@endif
				<br/>
				<label for="gender">Gender</label>
				<br>
				<input type="radio" name="gender" value="1" required> Male
				<input type="radio" name="gender" value="0"> Female<br>
				<label for="age">Age</label>
				<br/>
				<input type="number" id="age" name="age" required>
				<br/>
				<label for="user_thumbnail">thumbnail</label>
				<br/>
				<input type="file" id="user_thumbnail" name="user_thumbnail" accept="image/*" required>
				<br/>
				@if ($errors->has('user_thumbnail'))
					<div class="error">{{ $errors->first('user_thumbnail') }}</div> <br/>
				@endif
				<button type="submit" >Register</button>
				<br/>
			</form>
			<a href="/login"><p class="small">Sign In</p></a>
			<a href="#"><p class="small">Forgot your password?</p></a>
		</div>
	</div>
</body>
</html>