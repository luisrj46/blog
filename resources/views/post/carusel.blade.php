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
