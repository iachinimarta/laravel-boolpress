<template>
    <div>
        <article v-if="post">
            <h1 >{{post.title}}<span v-for="tag in post.tags" class="badge text-bg-primary" :key="tag.id">{{tag.name}}</span></h1>
            <div class="mb-2">
                Category: {{(post.category)?post.category.name : 'Nessuna categoria'}}
            </div>
                
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
                    console.log(this.post.category);
                })
                // .catch((error) => {
                //     this.$router.push({name: 'not-found'});
                // });
            }
        },
        mounted() {
            this.getDetails();
        }
    }
</script>

<style>

</style>