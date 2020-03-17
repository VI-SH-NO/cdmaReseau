<template>
  <div class="post-topbar">
    <v-avatar>
      <img :src="this.auth.upload_path + this.auth.avatar" alt="John" />
    </v-avatar>
    <br />
    <div>
      <v-textarea
        v-model="text"
        label="what's in ur mind"
        @keydown-enter="post"
        :no-resize="true"
        auto-grow
      ></v-textarea>
    </div>
    <div class="d-flex w-25" style="justify-content: flex-end; float: right;">
      <!-- <v-btn color="#e44d3a" class="white--text ml-2" icon>
        <v-icon>fas fa-pen</v-icon>
      </v-btn>-->
      <postVideoPicker />
      <postImagePicker />
      <v-btn color="#e44d3a" dark class="ml-5" icon @click="post">
        <v-icon>fas fa-pen</v-icon>
      </v-btn>
    </div>

    <!--post-st end-->
  </div>
</template>
<script>
import postImagePicker from "./postImagePicker";
import postVideoPicker from "./postVideoPicker";
export default {
  data() {
    return {
      text: "",
      auth,
      url: null
    };
  },
  mounted() {},
  methods: {
    post() {
      if (this.text === "") {
        return;
      }

      axios
        .post(`/api/post`, {
          body: this.text,
          api_token: auth.api_token
        })
        .then(res => {
          this.$store.commit("addPost", res.data);
          this.text = "";
        })
        .catch(e => {
          console.log(e);
        });
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    }
  },
  components: {
    postImagePicker,
    postVideoPicker
  }
};
</script>
<style lang="css" scoped>
/* #file {
  display: none;
}
.custom-file-upload {
  border: 1px solid #ccc;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
  background: #e44d3a;
  color: white;
} */
</style>