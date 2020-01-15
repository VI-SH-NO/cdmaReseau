<template>
  <div>
    <button
      class="btn btn-sm"
      :class="follow?'btn-danger':'btn-success'"
      @click="following"
      v-text="follow?'Unfollow':'Follow'"
    ></button>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      default: null
    }
  },
  mounted() {
    console.log(this.user);
  },
  data() {
    return {
      follow: false
    };
  },
  methods: {
    following() {
      if (!this.user) {
        alert("u gotta login");
        return;
      }
      this.follow = !this.follow;
    }
  }
};
</script>
