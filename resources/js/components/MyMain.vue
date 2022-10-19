<template>
    <div class="container">
        <h1>All</h1>

        <div v-if="loading" class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status"></div>     
        </div>

        <div v-else class="row">
            <div class="card col-12 mb-4" v-for="(post, index) in posts" :key="index">
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">{{truncateText(post.content, 50)}}</p>
                    <p class="card-text">{{post.category?post.category.name:'undefined'}}</p>
                    <a href="#">Read post</a>
                </div>
            </div>
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
    export default {
        name: 'MyMain',
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
            },
            truncateText(text, maxLength) {
                if(text.length < maxLength) {
                    return text.substring(0, maxLength);
                } else {
                    return text.substring(0, maxLength) + '...';
                }
            }
        },
        mounted() {
            this.getPosts();
        }
    }
</script>

<style>

</style>