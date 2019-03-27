@if(session()->has('message'))
    <div>
        <script type="text/javascript">
            window.onload = function() {
                alert('{{ session()->get('message') }}')
            }
        </script>
    </div>
@endif
<!DOCTYPE HTML>
<html>
<head>
    <title>MEOW MEOW</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ URL::asset('blog/assets/css/main.css') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('blog/images/logo.png') }}" />
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="{{route('home')}}">MEOW BLOG</a></h1>
        <nav class="links">
            <ul>
                <li><a href="{{route('view.create.blog')}}">NEW BLOG</a></li>
            </ul>
        </nav>
        <nav class="meta">
            <a href="#" class="author">
                <span class="name">{{ Auth::user()->name }}</span>
                <img src="{{ URL::asset('images/users/'.Auth::user()->user_thumbnail) }}" alt="" />
                <span>Age:{{Auth::user()->age}} </span>
                <span>{{Auth::user()->gender == 1 ? " | Male" : " | Female"}}</span>
            </a>
        </nav>
        <nav class="main">
            <ul>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Menu -->
    <section id="menu">

        <!-- Search -->
        <div class="meta">
            <a href="#" class="author"><span class="name">{{ Auth::user()->name }}</span><img src="{{ URL::asset('images/users/'.Auth::user()->user_thumbnail) }}" alt="" />
                <span> Age : {{Auth::user()->age}}</span>
                <span>{{Auth::user()->gender == 1 ? " | Male" : " | Female"}}</span>
            </a>
        </div>

        <!-- Links -->
        <section>
            <ul class="links">
                <li>
                    <a href="{{route('view.create.blog')}}">
                        <h3>New blog</h3>
                    </a>
                </li>
                <li>
                    <b>  Filter by age limit</b>
                    <article class="mini-post">
                        <select id="filter_select_age_right" onchange="filter(false, true)">
                            <option>Choose one</option>
                            <option value="{{ route("filterByAgeLimit.blog", [0]) }}" {{ (isset($age) && $age == 0) ? "selected" : "" }} >For everyone</option>
                            <option value="{{ route("filterByAgeLimit.blog", [5]) }}" {{ (isset($age) && $age == 5) ? "selected" : "" }} >For 5+</option>
                            <option value="{{ route("filterByAgeLimit.blog", [9]) }}" {{ (isset($age) && $age == 9) ? "selected" : "" }} >For 9+</option>
                            <option value="{{ route("filterByAgeLimit.blog", [13]) }}" {{ (isset($age) && $age == 13) ? "selected" : "" }} >For 13+</option>
                            <option value="{{ route("filterByAgeLimit.blog", [18]) }}" {{ (isset($age) && $age == 18) ? "selected" : "" }} >For 18+</option>
                        </select>
                    </article>

                    <b>  Filter by gender limit</b>
                    <article class="mini-post">
                        <select id="filter_select_gender_right" onchange="filter(false, false)">
                            <option>Choose one</option>
                            <option value="{{ route("filterByGenderLimit.blog", [2]) }}" {{ (isset($gender) && $gender == 2) ? "selected" : "" }}>For everyone</option>
                            <option value="{{ route("filterByGenderLimit.blog", [1]) }}" {{ (isset($gender) && $gender == 1) ? "selected" : "" }}>Man only</option>
                            <option value="{{ route("filterByGenderLimit.blog", [0]) }}" {{ (isset($gender) && $gender == 0) ? "selected" : "" }}>Woman only</option>
                        </select>
                    </article>
                </li>
                <li>

                    <!-- Mini Post -->
                    <b> Search blog</b>
                    <article class="mini-post">
                        <form method="GET" action="{{route("search.blog")}}">
                            {{ csrf_field() }}
                            <input type="text" name="title" placeholder="Title" value="{{ (isset($searchData) && isset($searchData['title'])) ? $searchData['title'] : "" }}">
                            <input type="text" name="content" placeholder="Content" value="{{ (isset($searchData) && isset($searchData['content'])) ? $searchData['content'] : "" }}">
                            <select name="age_limit">
                                <option value="0" {{ (isset($searchData) && $searchData['age_limit'] == 0) ? "selected" : "" }} >For everyone</option>
                                <option value="5" {{ (isset($searchData) && $searchData['age_limit'] == 5) ? "selected" : "" }} >For 5+</option>
                                <option value="9" {{ (isset($searchData) && $searchData['age_limit'] == 9) ? "selected" : "" }} >For 9+</option>
                                <option value="13" {{ (isset($searchData) && $searchData['age_limit'] == 13) ? "selected" : "" }} >For 13+</option>
                                <option value="18" {{ (isset($searchData) && $searchData['age_limit'] == 18) ? "selected" : "" }} >For 18+</option>
                            </select>
                            <input type="text" name='name' placeholder="Author name" value="{{ (isset($searchData) && isset($searchData['name'])) ? $searchData['name'] : "" }}">
                            <button type="submit">Search</button>
                        </form>
                    </article>
                </li>
            </ul>
        </section>

        <!-- Actions -->
        <section>
            <ul class="actions vertical">
                <li><a href="{{route('logout')}}" class="button big fit">Log Out</a></li>
            </ul>
        </section>

    </section>
