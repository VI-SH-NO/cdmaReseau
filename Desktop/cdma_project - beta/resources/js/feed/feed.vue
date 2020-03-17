<template>
    <div>
        <fieldpost></fieldpost>
        <posts v-if="!loading"></posts>
        <infinite-loading spinner="spiral" @infinite="getPosts">
            <div slot="no-more">No more</div>
            <div slot="no-results">No Posts yet</div></infinite-loading
        >

        <div v-if="loading" class="process-comm">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
</template>

<script>
import InfiniteLoading from "vue-infinite-loading";
import fieldpost from "./fieldpost";
import posts from "./posts";
export default {
    data() {
        return {
            loading: false,
            auth
        };
    },
    mounted() {
        console.log(this.test);
    },

    components: {
        fieldpost,
        posts,
        InfiniteLoading
    },
    methods: {
        getPosts($state) {
            axios
                .get(
                    `/api/post?offset=${this.posts.length}&api_token=${auth.api_token}`
                )
                .then(res => {
                    if (res.data.length > 0) {
                        this.$store.commit("addPosts", res.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                    // this.posts = Array.from(Response.data);
                })
                .catch(e => {
                    console.log(e);
                });
        }
    },
    computed: {
        posts() {
            return this.$store.state.posts;
        }
    }
};
</script>
