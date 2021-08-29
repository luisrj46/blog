<template>
<div>
  <header class="container-flex space-between">
        <div class="date">
        <span class="c-gris">{{post.published_date}} / {{ post.owner.name}}</span>
        </div>
        <div class="post-category">
            <!-- <a href="{{ route('category.ver', [$post->category]) }}" class="category text-capitalize">{{$post->category->name}}</a> -->
            <category-link :category="post.category"></category-link>
        </div>
    </header>
    <h1 v-text="post.title"></h1>
        <div class="divider"></div>
</div>
</template>

<script>
export default {
    
    props:['post']
}
</script>