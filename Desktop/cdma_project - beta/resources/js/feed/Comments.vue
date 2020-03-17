<template>
  <div class="comment-section">
    <div class="comment-sec">
      <div class="post-comment">
        <div class="d-flex align-items-center justify-content-between">
          <v-avatar class="mr-2">
            <img :src="this.auth.upload_path + this.auth.avatar" alt="John" />
          </v-avatar>

          <v-text-field :rules="rules" class="mr-1" v-model="comment" placeholder="Post a comment"></v-text-field>

          <v-btn small dark color="#e44d3a" @click="postComment" v-if="comment.length>0">post</v-btn>
        </div>
      </div>
      <div v-if="loading" class="process-comm">
        <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
        </div>
      </div>
      <div v-if="!loading">
        <ul>
          <li v-for="comment in comments" :key="comment.id" class="p-2 border-bottom mb-2">
            <div class="comment-list">
              <div class="comment w-75">
                <div class="d-flex w-100 mb-2">
                  <div class>
                    <img :src="comment.poster_avatar" alt style="width:70% ; border-radius:50%" />
                  </div>
                  <div class="col-10 p-0 mt-1 ml-2">
                    <h3 v-text="comment.poster_name"></h3>
                    <span>{{ comment.created }}</span>
                  </div>
                </div>
              </div>
            </div>
            <p class="ml-4 mb-0" v-text="comment.body"></p>
            <!--comment-list end-->

            <!--comment-list end-->
          </li>
        </ul>
        <button
          @click="getMore()"
          v-if="post.count > this.comments.length"
          class="view w-100"
        >View More</button>
      </div>
    </div>
    <!--comment-sec end-->

    <!--post-comment end-->
  </div>
</template>
<script>
export default {
  props: {
    post: {
      type: Object,
      default: null
    }
  },
  data() {
    return {
      comments: [],
      comment: "",
      loading: false,
      auth
    };
  },
  mounted() {
    this.loading = true;
    axios(`comments/${this.post.post}?offset=${this.comments.length}`).then(
      response => {
        this.comments = response.data;
        this.loading = false;
        console.log(response.data[0]);
      }
    );
  },
  methods: {
    postComment(id) {
      axios
        .post(`/comment`, {
          body: this.comment,
          post: this.post.post
        })
        .then(response => {
          console.log(response.data);
          this.comment = "";
          this.comments.unshift(response.data);
          this.$emit("newComment");
        });
    },

    getMore() {
      console.log(this.comments.length);
      axios(`comments/${this.post.post}?offset=${this.comments.length}`).then(
        response => {
          this.comments = this.comments.concat(response.data);
          console.log(response.data);
        }
      );
    }
  }
};
</script>
<style lang="css" scoped>
.send {
  float: right;
  color: #fff;
  background-color: #e44d3a;
  height: 40px;
  padding: 0 10px;
  text-align: center;
  font-size: 14px;
  border: 0;
  margin-left: 10px;
  cursor: pointer;
  font-weight: 600;
  outline: none;
}
.view {
  border: none;
  background: none;
  outline: none;
}
</style>
