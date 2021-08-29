<template>
    <div>
        <component :is="componentName" :items="items" ></component>
        <pagination-link :pagination="pagination"></pagination-link>

    </div>
</template>

<script>
export default {
    props:['url','componentName'],
    data(){
        return{
            pagination:{},
            items:[]
        }
    },
        mounted() {
            axios
                .get(`${this.url}?page=${this.$route.query.page || 1}`)
                .then(response =>console.log(
                    this.items=response.data.data,
                    this.pagination=response.data,
                    delete this.pagination.data
                    ))
                .catch(error => console.log(error))

        }
}
</script>

<style lang="scss">
    .pagination{
        a.active{
            background-color:#1abc9c;
            color:#fff
        }
    }
</style>
