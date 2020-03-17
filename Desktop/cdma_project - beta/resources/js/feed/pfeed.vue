<template>
  <div>
    <posts :posts="this.posts" :auth="this.auth" v-if="!loading"></posts>
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
import fieldpost from "./fieldpost";
import posts from "./posts";
export default {
  props: {
    user: {
      type: Object
    }
  },
  data() {
    return {
      posts: [],
      loading: false,
      auth
    };
  },
  mounted() {
    this.getPosts();
  },

  components: {
    fieldpost,
    posts
  },
  methods: {
    getPosts() {
      this.loading = true;
      axios
        .get(`/personalposts/${this.user.id}`)
        .then(Response => {
          this.loading = false;
          this.posts = Array.from(Response.data);
        })
        .catch(e => {
          console.log(e);
        });
    }
  }
};
</script>