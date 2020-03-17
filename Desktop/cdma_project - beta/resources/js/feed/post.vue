<template>
  <div class="post-bar">
    <div class="post_topbar">
      <div class="usy-dt">
        <img :src="post.poster_avatar" alt style="height:60px ; width:60px ; border-radius:50%" />
        <div class="usy-name">
          <h3 v-text="post.poster_name"></h3>
          <span v-text="post.created"></span>
        </div>
      </div>
      <div class="ed-opts">
        <a href="#" title class="ed-opts-open">
          <i class="la la-ellipsis-v"></i>
        </a>
        <ul class="ed-options">
          <li v-if="auth.id != post.poster">
            <a href="#" title>Hide</a>
          </li>
          <li v-if="auth.id == post.poster">
            <a href="#" title>Delete</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="epi-sec"></div>
    <div class="job_descp mt-3">
      <p v-text="post.body"></p>
      <ImagePreview
        v-if="post.is_image"
        :src="post.image"
        :poster_name="post.poster_name"
        :body="post.body"
      />
      <viedoPlayer v-if="post.is_video" :video="post.video" />
    </div>

    <div class="job-status-bar">
      <ul class="like-com mt-4 w-100">
        <li>
          <Like
            :post="{
                            id: post.id,
                            likeIt: post.likeIt,
                            count: post.likesCount
                        }"
          ></Like>
        </li>
        <li>
          <button href="#" class="com text-dark" @click="post.showComments = !post.showComments">
            <i class="fas fa-comment-alt"></i>
            Comments {{ post.commentsCount }}
          </button>
        </li>
      </ul>
    </div>
    <Comments
      v-if="post.showComments"
      :post="{ post: post.id, user: auth.id, count: post.commentsCount }"
      @newComment="post.commentsCount++"
    ></Comments>
    <!--comment-section end-->
  </div>
</template>
<script>
import Comments from "./Comments";
import ImagePreview from "./postImagePreview";
import viedoPlayer from "./VideoPlayer";

import Like from "./Like";

export default {
  props: {
    post: {
      type: Object,
      default: null
    },
    auth: {
      type: Object
    }
  },

  components: {
    Comments,
    Like,
    ImagePreview,
    viedoPlayer
  }
};
</script>
