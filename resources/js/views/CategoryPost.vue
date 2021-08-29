<template>
    <paginator :url="`/api/categorias/${this.category}`"
        component-name="post-list"></paginator>
</template>

<script>
export default {
    props:['category'],

}
</script>
