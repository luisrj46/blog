<template>
    <div class="buttons-social-media-share">
      <ul class="share-buttons">
        <li><a :href="`https://www.facebook.com/sharer/sharer.php?u=${url}&title=${descripcion}`" title="Compartir con Facebook" target="_blank"><img alt="Compartir con Facebook" src='/img/flat_web_icon_set/Facebook.png'></a></li>
        <li><a :href="`https://twitter.com/intent/tweet?url=${url}&text=${descripcion}&hashtags={Zendero}`" target="_blank" title="Tweet"><img alt="Tweet" src='/img/flat_web_icon_set/Twitter.png'></a></li>
        <li><a :href="`https://plus.google.com/share?url=${url}&text=${descripcion}`" target="_blank" title="Compartir con Google+"><img alt="Compartir con Google+" src='/img/flat_web_icon_set/Google+.png'></a></li>
        <li><a :href="`http://pinterest.com/pin/create/button/?url=${url}`" target="_blank" title="Pin it"><img alt="Pin it" src='/img/flat_web_icon_set/Pinterest.png'></a></li>
      </ul>
    </div>
</template>

<script>
export default {
    props:["descripcion"],
    computed:{
        url(){
            return document.URL;
        }
    }
}
</script>
