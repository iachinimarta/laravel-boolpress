<template>
    <div class="container">
        <div v-if="loading" class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status"></div>     
        </div>

        <div v-else class="row">
            <MyPost v-for="(post, index) in posts" :key="index" :post="post"/>
        </div>

        <nav>
            <ul class="pagination">
                <li class="page-item" :class="(currentPage==1)?'disabled':''">
                    <a class="page-link" href="#" aria-label="Previous" @click="getPosts(currentPage - 1)">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item page-link">{{currentPage+"/"+lastPage}}</li>
                <li class="page-item" :class="(currentPage==lastPage)?'disabled':''">
                    <a class="page-link" href="#" aria-label="Next" @click="getPosts(currentPage + 1)">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    import MyPost from '../components/MyPost.vue';

    export default {
        name: 'BlogPage',
        components: {
            MyPost
        },
        data() {
            return {
                posts: [],
                currentPage: 1,
                lastPage: null,
                loading: true
            }
        },
        methods: {
            getPosts(page) {

                this.loading = true;

                axios.get('api/posts', {
                    params : {
                        page: page
                    }
                })
                .then((response) => {
                    this.posts = response.data.results.data;
                    this.loading = false;
                    this.currentPage = response.data.results.current_page;
                    this.lastPage = response.data.results.last_page;
                });
            }
        },
        mounted() {
            this.getPosts();
        }
    }
</script>

<style>

</style>