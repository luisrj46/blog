<template>
<paginator :url="`/api/tags/${this.tag}`"
        component-name="post-list"></paginator>
</template>

<script>
export default {
    props:['tag']//importando el valor del parametro que se pasa por medio del router
    // data() {
    //     return {
    //         posts:{
    //            owner:{},
    //             category:{},
    //             tags:{}
    //         },


    //     }
    // },
    //  mounted() {
    //     this.getPost()
    // },
    // // beforeRouteUpdate(to,from, next){ //esta forma de actualizar el contenido
    // //     console.log("to",to.params.tag);
    // //     console.log("from",from.params.tag);
    // //     this.tag=to.params.tag;

    // //     this.getPost();
    // //     next();

    // // },
    // methods:{
    //     getPost(){
    //         return axios
    //         .get(`/api/tags/${this.tag}`)
    //         .then(response =>console.log(this.posts=response.data))
    //         .catch(error => console.log(error))
    //     }
    // },
    // // watch:{ //esta es una forma de actualizar el contenido de la pagina mediante un watch
    // //     tag(){
    // //     this.getPost()
    // // }
    // // }
}
</script>
