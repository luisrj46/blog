@extends('layouts.header')
@section('meta-title')
{{$post->title}}
@endsection
@section('meta-description')
{{Str::limit($post->excerpt, 145,'.')}}
@endsection
@section('content')
<article class="post image-w-text container">

    {{-- @if ($post->photos->count()===1)
        @include('post.photo')
    @elseif($post->photos->count()>1)
        @include('post.carusel')
     @elseif($post->iframe)
        @include('post.iframe')
    @endif --}}
        @include($post->viewType())

      <div class="content-post">
        @include('post.header')

        <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
          <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure>
          <div>
            {!!$post->body!!}
          </div>
        </div>
        <footer class="container-flex space-between">
            @include('partials.social-media',['descripcion'=>$post->title])
            @include('post.tags')
        </footer>

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
