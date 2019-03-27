@include('layouts/header')
<!-- Main -->
<div id="main">

    <!-- Post -->
    @foreach($blogs as $blog)
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="{{ route('show.blog', ['blog' => $blog->id]) }}">{{$blog->title}}</a></h2>
                    @if($blog->age_limit == 0)
                        <p>For every age</p>
                    @else()
                        <p>For {{$blog->age_limit}}+ </p>
                    @endif
                    @if($blog->gender_limit == 0)
                        <p>Woman only</p>
                    @elseif($blog->gender_limit == 1)
                        <p>Man only</p>
                    @endif
                </div>
                <div class="meta">
                    <time class="published" datetime="2017-11-01">{{date('F-d-Y', strtotime($blog->created_at)) }}</time>
                    <a href="#" class="author"><span class="name">{{$blog->user->name}}</span><img src="{{ asset('images/users/'.$blog->user->user_thumbnail) }}" alt="" /></a>
                </div>
            </header>
            <a href="{{  route('show.blog', ['blog' => $blog->id]) }}" class="image featured"><img src="{{ URL::asset('images/blogs/'.$blog->blog_thumbnail) }}" alt="" /></a>
            <p style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 500px">{{ $blog->content }}</p>
            <ul class="actions">
                <li><a href="{{ route('show.blog', ['blog' => $blog->id]) }}" class="button big">Continue Reading</a></li>
            </ul>
            <ul class="stats" style="list-style-type: none">
                @can('update', $blog)
                    <li><a href="{{ route('view.edit.blog', ['blog' => $blog->id]) }}" class="icon fa-edit"> Edit </li></a>
                    <li onclick="return confirm('Are you sure to delete?')" ><a href="{{  route('delete.blog', ['blog' => $blog->id]) }}" class="icon fa-trash"> Delete </li></a>
                @endcan
            </ul>
        </article>
    @endforeach
    {{ $blogs->appends($searchData)->links() }}
</div>
@include('layouts.footer')
