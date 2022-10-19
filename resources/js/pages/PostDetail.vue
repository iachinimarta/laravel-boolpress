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
                    console.log(response);
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