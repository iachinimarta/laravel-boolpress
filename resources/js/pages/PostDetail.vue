<template>
    <div>
        <article v-if="post">
            <h1>{{post.title}}</h1>
            <div class="mb-2 badge bg-primary text-light">
                {{(post.category)?post.category.name : '-'}}
            </div>
            <div v-if="post.tags != 0">
                <div v-for="tag in post.tags" class="badge bg-primary text-light" :key="tag.id">#{{tag.name}}</div>  
            </div> 
            <div v-else class="badge bg-primary text-light">Nessun tag</div>  
            <!-- <img class="img-fluid mb-4" :src="post.cover" :alt="post.title" /> -->
            <h4>Content:</h4>
            <p>{{post.content}}</p>
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