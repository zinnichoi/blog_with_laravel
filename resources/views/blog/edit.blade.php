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
        <form action="{{route('update.blog', ['blog' => $blog->id])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" value="{{$blog->id}}" name="id">
            <input type="hidden" value="{{$blog->user_id}}" name="user_id">
            <label for="title">Title</label>
            <br/>
            <input type="text" id="title" name="title" value="{{$blog->title}}" required>
            @if ($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div> <br/>
            @endif
            <br/>
            <label for="content">Content</label>
            <br/>
            <textarea rows="15" cols="38" name="content" required>{{$blog->content}}</textarea>
            <br/>
            @if ($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div> <br/>
            @endif
            <label for="blog_thumbnail">thumbnail</label>
            <br/>
            <input type="file" id="blog_thumbnail" name="blog_thumbnail" accept="image/*" value="{{$blog->thumbnail}}" >
            <br/>
            @if ($errors->has('blog_thumbnail'))
                <div class="error">{{ $errors->first('blog_thumbnail') }}</div> <br/>
            @endif
            <br/>
            <label for="gender_limit">Gender limit</label>
            <br/>
            <select name="age_limit">
                <option value="0" {{ $blog->age_limit == 0 ? "Selected" : "" }} >every one</option>
                <option value="5" {{ $blog->age_limit == 5 ? "Selected" : "" }} >5+</option>
                <option value="9" {{ $blog->age_limit == 9 ? "Selected" : "" }} >9+</option>
                <option value="13" {{ $blog->age_limit == 13 ? "Selected" : "" }}>13+</option>
                <option value="18" {{ $blog->age_limit == 18 ? "Selected" : "" }} >18+</option>
            </select>
            <br/>
            <label for="gender_limit">Gender limit</label>
            <br/>
            <select name="gender_limit">
                <option value="2" {{ $blog->gender_limit == 2 ? "Selected" : "" }}>every one</option>
                <option value="1" {{ $blog->gender_limit == 1 ? "Selected" : "" }}>man only</option>
                <option value="0" {{ $blog->gender_limit == 0 ? "Selected" : "" }}>woman only</option>
            </select>
            <br/>
            <button type="submit" >UPDATE</button>
            <br/>
        </form>
        <a href="{{URL::to('/')}}"><p class="small">Cancel</p></a>
    </div>
</div>
</body>
</html>
