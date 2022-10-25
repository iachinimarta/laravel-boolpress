<template>
    <div>
        <article v-if="post">
            <h1>{{post.title}}</h1>

            <div class="mb-5">
                <span class="mb-2 badge bg-primary text-light">
                    {{(post.category)?post.category.name : 'No category'}}
                </span>

                <span v-if="post.tags != 0">
                    <span v-for="tag in post.tags" class="badge bg-primary text-light" :key="tag.id">#{{tag.name}}</span>  
                </span> 
                <span v-else class="badge bg-primary text-light">No tag</span>
            </div>
            
            <!-- <img class="img-fluid mb-4" :src="post.cover" :alt="post.title" /> -->
            <div class="mb-5">
                <h4>Content:</h4>
                <p>{{post.content}}</p>
            </div>
            
            <router-link :to="{name: 'blog'}">Lista dei post</router-link>
        </article>
        <div v-else class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'PostDetail',
        data() {
            return {
                post: null
            }
        },
        methods: {
            getDetails() {
                const slug = this.$route.params.slug;
                axios.get('/api/posts/' + slug)
                .then((response) => {
                    this.post = response.data.result;
                    console.log(this.post);
                })
                .catch((error) => {
                    this.$router.push({name: 'not-found'});
                });
            }
        },
        mounted() {
            this.getDetails();
        }
    }
</script>

<style>

</style>