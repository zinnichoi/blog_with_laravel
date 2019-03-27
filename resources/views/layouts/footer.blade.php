<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="#" class="logo"><img src="{{ URL::asset('blog/images/mianlogo.png') }}" alt="" /></a>
        <header>
            <h2>MEOW MEOW</h2>
            <p>Meo moe meo moe meo</p>
        </header>
    </section>

    <!-- Mini Posts -->
    <section>
        <div class="mini-posts">

            <b>  Filter by age limit</b>
            <article class="mini-post">
                <select id="filter_select_age" onchange="filter(true, true)">
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
                <select id="filter_select_gender" onchange="filter(true, false)">
                    <option>Choose one</option>
                    <option value="{{ route("filterByGenderLimit.blog", [2]) }}" {{ (isset($gender) && $gender == 2) ? "selected" : "" }}>For everyone</option>
                    <option value="{{ route("filterByGenderLimit.blog", [1]) }}" {{ (isset($gender) && $gender == 1) ? "selected" : "" }}>Man only</option>
                    <option value="{{ route("filterByGenderLimit.blog", [0]) }}" {{ (isset($gender) && $gender == 0) ? "selected" : "" }}>Woman only</option>
                </select>
            </article>

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
        </div>
    </section>

    <!-- Posts List -->
    <section>
        <ul class="posts">
            <li>
                <article>
                    <header>
                        <h3><a href="#">Lorem ipsum fermentum ut nisl vitae</a></h3>
                        <time class="published" datetime="2017-10-20">October 20, 2017</time>
                    </header>
                    <a href="#" class="image"><img src="{{ URL::asset('blog/images/pic08.jpg') }}" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">Convallis maximus nisl mattis nunc id lorem</a></h3>
                        <time class="published" datetime="2017-10-15">October 15, 2017</time>
                    </header>
                    <a href="#" class="image"><img src="{{ URL::asset('blog/images/pic09.jpg') }}" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">Euismod amet placerat vivamus porttitor</a></h3>
                        <time class="published" datetime="2017-10-10">October 10, 2017</time>
                    </header>
                    <a href="#" class="image"><img src="{{ URL::asset('blog/images/pic10.jpg') }}" alt="" /></a>
                </article>
            </li>
        </ul>
    </section>

    <!-- About -->
    <section class="blurb">
        <h2>About</h2>
        <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
        <ul class="actions">
            <li><a href="#" class="button">Learn More</a></li>
        </ul>
    </section>

    <!-- Footer -->
    <section id="footer">
        <ul class="icons">
            <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
            <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
        </ul>
    </section>

</section>

</div>

<!-- Scripts -->
<script src="{{ URL::asset('blog/assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('blog/assets/js/skel.min.js') }}"></script>
<script src="{{ URL::asset('blog/assets/js/util.js') }}"></script>
<!--[if lte IE 8]><script src="{{ URL::asset('blog/assets/js/ie/respond.min.js') }}"></script><![endif]-->
<script src="{{ URL::asset('blog/assets/js/main.js') }}"></script>
</body>
</html>