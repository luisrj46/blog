<template>
    <article class="post image-w-text container">
<!--
    {{-- @if ($post->photos->count()===1)
        @include('post.photo')
    @elseif($post->photos->count()>1)
        @include('post.carusel')
     @elseif($post->iframe)
        @include('post.iframe')
    @endif --}}
        @include($post->viewType()) -->

      <div class="content-post">
          <post-header :post="post"></post-header>

        <div class="image-w-text">
          <!-- <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure> -->
          <div v-html="post.body">
          </div>
        </div>
        <footer class="container-flex space-between">
            <social-link :descripcion="post.title"></social-link>
            <!-- @include('partials.social-media',['descripcion'=>$post->title]) -->
            <!-- @include('post.tags') -->
            <tags-link :tags="post.tags"></tags-link>
        </footer>

      <div class="comments">
      <div class="divider"></div>
      <disqus-comment></disqus-comment>
        <!-- @include('partials.discus-script') -->
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

		      </div><!-- .comments -->
    </div>
  </article>

</template>

<script>
export default {
    props:['url'],
    data() {
        return {
            post:{
               owner:{},
                category:{}
            },


        }
    },
     mounted() {
        axios
            .get(`/api/blog/${this.$route.params.url}`)
            .then(response =>console.log(this.post=response.data))
            .catch(error => console.log(error))

    },
}
</script>
