<template>
    <section class="posts container">
        <!-- @if (isset($title))
            <h3>{{$title}}</h3>
        @endif -->
        <posts-list-item
            v-for="(post,index) in items"
            :post="post"
            :key="post.index"></posts-list-item>

        <!-- @empty -->
        <article class="post image-w-text container" v-if="!items.length">

			<div class="content-post">
                <h1>Aun no hay Publicaciones</h1>
            </div>
        </article>

        <!-- @endforelse -->



	</section><!-- fin del div.items.container -->



</template>

<script>
export default {
    props:['items']
}
</script>
