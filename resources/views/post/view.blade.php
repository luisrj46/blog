@extends('layouts.header')
@section('meta-title')
{{$post->title}}
@endsection
@section('meta-description')
{{Str::limit($post->excerpt, 145,'.')}}
@endsection
@section('content')
<article class="post image-w-text container">
    @if ($post->photos->count()===1)
    <figure><img src="{{$post->photos->first()->url}}" alt="" class="img-responsive">
    </figure>
    @elseif($post->photos->count()>1)
    <div   id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($post->photos as $photo)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration-1}}" class="{{$loop->iteration===1?'active':''}}"></li>
            @endforeach

        {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
        </ol>

        <div class="carousel-inner">
            @foreach ($post->photos as $photo)
            <div class="carousel-item {{$loop->iteration===1?'active':''}}">
                <img class="d-block w-100" src="{{url($photo->url)}}" alt="First slide">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-custom-icon" aria-hidden="true">
            <i class="fas fa-chevron-left"></i>
          </span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-custom-icon" aria-hidden="true">
            <i class="fas fa-chevron-right"></i>
          </span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    @endif

      <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{$post->published_at->format('M d')}}</span>
        </div>
        <div class="post-category">
          <span class="category">{{$post->category->name}}</span>
        </div>
      </header>
    <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
          <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure>
          <div>
            {!!$post->body!!}
          </div>
        </div>

        @include('partials.social-media',['descripcion'=>$post->title])
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
        @include('partials.discus-script')
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

		      </div><!-- .comments -->
		    </div>
  </article>
@endsection
@push('stylos')
<link rel="stylesheet" href={{asset('admin/dist/css/adminlte.min.css')}}>
@endpush
@push('scriptt')
<script src={{asset('admin/plugins/jquery/jquery.min.js')}}></script>
<!-- Bootstrap 4 -->
<script src={{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}></script>
@endpush
@push('scripts')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <!-- jQuery -->

@endpush
