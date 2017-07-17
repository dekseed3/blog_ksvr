@extends('main_user')

@section('title', "| Blog")

@section('content')

	<!-- Featured Post -->
		<article class="post featured">
			<header class="major">
				<span class="date">{{ date('M j, Y', strtotime($firstItem->created_at)) }}</span>
				<h2><a href="{{ url('blog/'.$firstItem->slug) }}">{{ $firstItem->title }}</a></h2>
				<p>{!! $firstItem->body !!}</p>
			</header>
			{{-- <a href="#" class="image main"><img src="images/pic01.jpg" alt="" /></a> --}}
			<ul class="actions">
				<li><a href="{{ url('blog/'.$firstItem->slug) }}" class="button big">อ่านต่อ</a></li>
			</ul>
		</article>

		<!-- Posts -->
			<section class="posts">

				@foreach($posts as $post)
							<article>
								<header>
									<span class="date">{{ date('M j, Y', strtotime($post->created_at)) }}</span>
									<h2><a href="#">{{ $post->title }}</a></h2>
								</header>
								{{-- <a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a> --}}
								<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen($post->body) > 250 ? '...' : "" }}</p><ul class="actions">
									<li><a href="{{ url('blog/'.$post->slug) }}" class="button">อ่านต่อ</a></li>
								</ul>
							</article>

				@endforeach
			</section>
			<!-- Footer -->
				<footer>
					<div class="pagination">
						{!! $posts->links() !!}
					</div>
				</footer>

@endsection
