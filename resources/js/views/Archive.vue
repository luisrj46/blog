<template>
<section class="pages container">
    <div class="page page-archive">
        <h1 class="text-capitalize">archive</h1>
        <p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
        <div class="divider-2" style="margin: 35px 0;"></div>
        <div class="container-flex space-between">
            <div class="authors-categories">
                <h3 class="text-capitalize">authors</h3>
                <ul class="list-unstyled">
                    <!-- @foreach ($authors as $author) -->
                    <li v-for="author in authors" :key="author.name" v-text="author.name"></li>
                    <!-- @endforeach -->
                </ul>
                <h3 class="text-capitalize">categories</h3>
                <ul class="list-unstyled">
                    <!-- @foreach ($categories as $category) -->
                    <li class="text-capitalize" v-for="category in categories" :key="category.url" >
                        <category-link :category="category"></category-link>


                    </li>
                    <!-- @endforeach -->

                </ul>
            </div>
            <div class="latest-posts">
                <h3 class="text-capitalize">latest posts</h3>
                    <p v-for="post in posts" :key="post.url">
                        <post-link :post="post">{{post.title}}</post-link>
                    </p>
                <h3 class="text-capitalize">posts by month</h3>
                <ul class="list-unstyled">
                        <li class="text-capitalize" v-for="date in dates" :key="dates.year" >
                            <!-- <a href="{{ route('inicio', ['month'=>$date->month,'year'=>$date->year]) }}"> -->
                                {{date.monthname}} {{date.year}} ({{date.posts}})
                            <!-- </a> -->
                        </li> 
                    <!-- @endforeach -->
                </ul>
            </div>
        </div>
    </div>
</section>
</template>
<script>
    export default {
        data(){
            return{
                authors:[],
                categories:[],
                posts:[],
                dates:[],
            }
            },
        mounted() {
            axios
                .get('/api/archivos')
                .then(response =>console.log(
                    this.authors=response.data.authors,
                    this.categories=response.data.categories,
                    this.posts=response.data.posts,
                    this.dates=response.data.dates,
                    ))
                .catch(error => console.log(error))
                        // axios.get('/api/posts')
            // .them(resp=>{
            //     console.log(resp);
            // })
        },
    }
</script>
