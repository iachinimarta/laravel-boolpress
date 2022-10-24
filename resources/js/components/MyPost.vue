<template>
    <div class="card col-12 mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ post.title }}</h4>
            <p class="card-text">{{truncateText(post.content, 50)}}</p>

            <div class="mb-4">

                <div v-if="post.category">
                    <p class="card-text mr-2">{{post.category.name}}</p>
                </div>
                <div v-else>
                    <p class="card-text mr-2">No category</p>
                </div>

                <div v-if="post.tags != 0">
                    <p v-for="(tag,index) in post.tags" :key="index" class="card-text">#{{tag.name}}</p>
                </div>
                <div v-else>
                    <p class="card-text">No tag</p>
                </div>

            </div>

            <router-link :to="{
                name: 'post_detail', 
                params: {slug: post.slug}
                }"
            >
                Read post
            </router-link>
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