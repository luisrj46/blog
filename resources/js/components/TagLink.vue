<template>
    <div  class="tags container-flex">
        <span v-for="(tag,index) in tags" :key="tag.index" class="tag c-gris text-capitalize"><router-link :to="{name:'tag_post',params:{tag:tag.url}}">#{{tag.name}}</router-link>  </span>
    </div>
</template>

<script>
export default {
    props:["tags"]
}
</script>
