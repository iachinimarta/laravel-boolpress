<template>
    <div>Detail</div>
</template>

<script>
    export default {
        name: 'PostDetail',
        methods: {
            getDetails() {
                const slug = this.$route.params.slug;
                axios.get('/api/posts/' + slug)
                .then((response) => {
                    this.post = response.data.result;
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