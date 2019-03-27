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
        <form action="{{route('create.blog')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{$id}}" name="user_id">
            <input name="action_type" type="hidden" value="create">
            <label for="title">Title</label>
            <br/>
            <input type="text" id="title" name="title" required>
            @if ($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div> <br/>
            @endif
            <br/>
            <label for="content">Content</label>
            <br/>
            <textarea rows="15" cols="38" name="content" required> </textarea>
            <br/>
            @if ($errors->has('content'))
                <div class="error">{{ $errors->first('content') }}</div> <br/>
            @endif
            <label for="blog_thumbnail">thumbnail</label>
            <br/>
            <input type="file" id="blog_thumbnail" name="blog_thumbnail" accept="image/*" required>
            <br/>
            <label for="age_limit">Age limit</label>
            <br/>
            <select name="age_limit">
                <option value="0" selected>every one</option>
                <option value="5">5+</option>
                <option value="9">9+</option>
                <option value="13">13+</option>
                <option value="18">18+</option>
            </select>
            <br/>
            <label for="gender_limit">Gender limit</label>
            <br/>
            <select name="gender_limit">
                <option value="2">every one</option>
                <option value="1">man only</option>
                <option value="0">woman only</option>
            </select>
            <br/>
            <button type="submit" >Post</button>
            <br/>
        </form>
        <a href="{{route('home')}}"><p class="small">Cancel</p></a>
    </div>
</div>
</body>
</html>
