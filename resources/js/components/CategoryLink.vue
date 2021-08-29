<template>
<div>
     <router-link class="category" 
     :to="{name:'category_post',
     params:{category:category.url}}">
        {{category.name}}
        </router-link>
</div>
</template>

<script>
export default {
    
    props:['category']
}
</script>