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
