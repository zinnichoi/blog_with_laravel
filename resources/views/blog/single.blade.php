@include('layouts/header')
				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2>{{$blog->title}}</h2>
										@if($blog->age_limit == 0)
											<p>For everyone</p>
										@else()
											<p>For {{$blog->age_limit}}+ </p>
										@endif
									</div>
									<div class="meta">
										<time class="published" datetime="2017-11-01"> {{date('F-d-Y', strtotime($blog->created_at)) }} </time>
										<a href="#" class="author"><span class="name">{{$blog->user->name}}</span><img src="{{URL::asset('images/users/'.$blog->user->user_thumbnail)}}" alt="" /></a>
									</div>
								</header>
								<span class="image featured"><img src="{{URL::asset('images/blogs/'.$blog->blog_thumbnail)}}" alt="" /></span>
								<p>{{$blog->content}}</p>
								<footer>
                                        <ul class="stats">
                                            @can('update', $blog)
												<li><a href="{{ route('view.edit.blog', ['blog' => $blog->id]) }}" class="icon fa-edit"> Edit </li></a>
												<li onclick="return confirm('Are you sure to delete?')" ><a href="{{  route('delete.blog', ['blog' => $blog->id]) }}" class="icon fa-trash"> Delete </li></a>
											@endcan
                                        </ul>
								</footer>
							</article>

							<div class="comment">
								<h2> Comments </h2>
								<div class="user-cmt">
									<h5>@User Name</h5>
									<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem tempore quis facere dolorum suscipit laboriosam numquam, vero similique illum aspernatur maiores ut. Dolorem porro amet, cum magnam sunt voluptatem nesciunt!</p>

									<h5>@User Name</h5>
									<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem tempore quis facere dolorum suscipit laboriosam numquam, vero similique illum aspernatur maiores ut. Dolorem porro amet, cum magnam sunt voluptatem nesciunt!</p>

									<h5>@User Name</h5>
									<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem tempore quis facere dolorum suscipit laboriosam numquam, vero similique illum aspernatur maiores ut. Dolorem porro amet, cum magnam sunt voluptatem nesciunt!</p>

								</div>
									<h4> Related Authors </h4>
								<div class="tags">	
								
										<ul>
										
											<li><button><a href="">Justin</a></button></li>
											<li><button><a href="">Teddy</a></button></li>
											<li><button><a href="">Thomdmas</a></button></li>
											<li><button><a href="">Big daddy</a></button></li>
											<li><button><a href="">Lenda Mixer</a></button></li>
											<li><button><a href="">JOnald Thang</a></button></li>
										</ul>
										</div>
							</div>
					</div>
			</div>
		<!-- Scripts -->
			<script src="{{URL::asset('blog/assets/js/jquery.min.js') }}"></script>
			<script src="{{URL::asset('blog/assets/js/skel.min.js') }}"></script>
			<script src="{{URL::asset('blog/assets/js/util.js') }}"></script>
			<!--[if lte IE 8]><script src="{{URL::asset('blog/assets/js/ie/respond.min.js') }}"></script><![endif]-->
			<script src="{{URL::asset('blog/assets/js/main.js') }}"></script>
	</body>
</html>
