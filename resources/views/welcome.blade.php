@extends('layouts.header')
@section('content')

	<section class="posts container">
        @if (isset($title))
            <h3>{{$title}}</h3>
        @endif
        @foreach ($posts as $post)
		<article class="post conteiner a11y-speak-region">
            @if ($post->photos->count()===1)
                <figure><img src="{{$post->photos->first()->url}}" alt="" class="img-responsive"></figure>
            @elseif($post->photos->count()>1)
                <div class="gallery-photos" data-masonry='{"itemSelector":"grid-item","columWhidth":"464"}'>
					@foreach ($post->photos->take(4) as $photos)

                        <figure class="grid-item grid-item--height2">


                            <img class="img-responsive" src="{{url($photos->url)}}" alt="">
                            @if ($loop->iteration === 4)
                            <div class="overlay">{{$post->photos->count()}} Fotos</div>
                            @endif
						</figure>

                    @endforeach
                </div>

            @elseif($post->iframe)
            <div class="video">
                {!!$post->iframe!!}
			</div>

            @endif
			<div class="content-post">
				<header class="container-flex space-between">
					<div class="date">
						<span class="c-gray-1">{{$post->published_at->format('M d')}}</span>
					</div>
					<div class="post-category">
						<a href="{{ route('category.ver', [$post->category]) }}" class="category text-capitalize">{{$post->category->name}}</a>
					</div>
				</header>
            <h1>{{$post->title}}</h1>
                <div class="divider"></div>
                <div>

                    <p>{!!$post->body !!}</p>
                </div>
				<footer class="container-flex space-between">
					<div class="read-more">
						<a href="{{ route('post.ver', [$post]) }}" class="text-uppercase c-green">Leer Mas</a>
					</div>
					<div class="tags container-flex">
                        @foreach ($post->tags as $tag)
                            <span class="tag c-gray-1 text-capitalize"><a href="{{ route('tag.ver', [$tag]) }}">#{{$tag->name}}</a>  </span>

                        @endforeach

					</div>
				</footer>
			</div>
        </article>
        @endforeach



	</section><!-- fin del div.posts.container -->

	{{-- <div class="pagination">
		<ul class="list-unstyled container-flex space-center">
			<li><a href="#" class="pagination-active">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
		</ul>
    </div> --}}

    {{$posts->links('vendor.pagination.default')}}

@stop
