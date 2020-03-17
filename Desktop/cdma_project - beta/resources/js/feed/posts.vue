<template>
    <div class="posts-section">
        <post
            v-for="post in posts"
            :key="post.id"
            :post="post"
            :auth="auth"
        ></post>
    </div>
</template>
<script>
import post from "./post";
export default {
    data() {
        return {
            comments: [],
            auth
        };
    },
    methods: {},
    components: {
        post
    },
    computed: {
        posts() {
            return this.$store.state.posts;
        }
    }
};
</script>
