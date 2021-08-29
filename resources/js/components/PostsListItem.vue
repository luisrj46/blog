<template>
    <article  class="post image-w-text container">

            <!-- @include($post->viewType('home')) -->

			<div class="content-post">
                    <post-header :post="post"></post-header >

                    <div>
                        <p v-html="post.body"></p>
                    </div>
				    <footer class="container-flex space-between">
					<div class="read-more">
                        <post-link class="text-uppercase c-green" :post="post">Leer mas</post-link>

					</div>
                    <div  class="tags container-flex">
                                <tags-link :tags="post.tags"></tags-link>

                    </div>

				    </footer>
            </div>
        </article>
</template>

<script>
export default {
    props:['post']
}
</script>
