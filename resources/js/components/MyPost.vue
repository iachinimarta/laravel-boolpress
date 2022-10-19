<template>
    <div class="card col-12 mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{truncateText(post.content, 50)}}</p>
            <p class="card-text">{{post.category?post.category.name:'undefined'}}</p>
            <router-link :to="{name: 'post_detail', params: {slug: post.slug}}">Read post</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'MyPost',
        props: {post: Object},
        methods: {
            truncateText(text, maxLength) {
                if(text.length < maxLength) {
                    return text.substring(0, maxLength);
                } else {
                    return text.substring(0, maxLength) + '...';
                }
            }
        }
    }
</script>

<style>

</style>