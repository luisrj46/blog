@extends('layouts.header')
@section('content')

	<section class="posts container">
        @if (isset($title))
            <h3>{{$title}}</h3>
        @endif

        @forelse ($posts as $post)
		<article class="post image-w-text container">

            @include($post->viewType('home'))

			<div class="content-post">
                @include('post.header')
                <h1>{{$post->title}}</h1>
                    <div class="divider"></div>
                    <div>

                        <p>{!!$post->body !!}</p>
                    </div>
				    <footer class="container-flex space-between">
					<div class="read-more">
						<a href="{{ route('post.ver', [$post]) }}" class="text-uppercase c-green">Leer Mas</a>
					</div>
                    @include('post.tags')
				    </footer>
            </div>
        </article>

        @empty
        <article class="post image-w-text container">

			<div class="content-post">
                <h1>Aun no hay Publicaciones</h1>
            </div>
        </article>

        @endforelse



	</section><!-- fin del div.posts.container -->

	{{-- <div class="pagination">
		<ul class="list-unstyled container-flex space-center">
			<li><a href="#" class="pagination-active">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
		</ul>
    </div> --}}

    {{$posts->appends(request()->all())->links('vendor.pagination.default')}}

@stop
