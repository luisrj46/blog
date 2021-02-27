<header class="container-flex space-between">
    <div class="date">
    <span class="c-gris">{{$post->published_at->format('M d')}} / {{ $post->owner->name}}</span>
    </div>
    <div class="post-category">
        <a href="{{ route('category.ver', [$post->category]) }}" class="category text-capitalize">{{$post->category->name}}</a>
    </div>
</header>
