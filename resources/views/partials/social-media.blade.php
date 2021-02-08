<footer class="container-flex space-between">
    <div class="buttons-social-media-share">
      <ul class="share-buttons">
        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullUrl()}}&title={{$descripcion}}" title="Compartir con Facebook" target="_blank"><img alt="Compartir con Facebook" src={{asset('img/flat_web_icon_set/Facebook.png')}}></a></li>
        <li><a href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$descripcion}}&hashtags={Zendero}" target="_blank" title="Tweet"><img alt="Tweet" src={{asset('img/flat_web_icon_set/Twitter.png')}}></a></li>
        <li><a href="https://plus.google.com/share?url={{request()->fullUrl()}}&text={{$descripcion}}" target="_blank" title="Compartir con Google+"><img alt="Compartir con Google+" src={{asset('img/flat_web_icon_set/Google+.png')}}></a></li>
        <li><a href="http://pinterest.com/pin/create/button/?url={{request()->fullUrl()}}" target="_blank" title="Pin it"><img alt="Pin it" src={{asset('img/flat_web_icon_set/Pinterest.png')}}></a></li>
      </ul>
    </div>
    <div class="tags container-flex">
        @foreach ($post->tags as $tag)
          <span class="tag c-gris">#{{$tag->name}}</span>
        @endforeach
    </div>
</footer>
