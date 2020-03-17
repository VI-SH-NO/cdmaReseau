<template>
  <div class="type_msg">
    <div class="input_msg_write">
      <input
        type="text"
        class="write_msg"
        placeholder="Type a message"
        v-model="message"
        @keypress.enter="sendMessage"
      />
      <div class="msg-btn-group">
        <!-- <button @click="pickImage" class="msg_send_btn" type="button" style="outline:none">
          <i class="fas fa-camera"></i>
        </button>-->
        <input type="file" name hidden ref="image" />
        <button @click="sendMessage" class="msg_send_btn" type="button" style="outline:none">
          <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: ""
    };
  },
  methods: {
    sendMessage() {
      if (this.message.length > 0) {
        console.log("hello");
        this.$emit("sendMessage", this.message);
        this.message = "";
      }
    }
    // },
    // pickImage() {
    //   this.$refs.image.addEventListener("click", e => {
    //     const reader = new FileReader();
    //     reader.onload = function() {
    //       img = new Image();
    //       img.src = reader.result;
    //       console.log(img.src);
    //     };

    //     reader.readAsDataURL(e.target.files[0]);
    //     console.log(e);
    //   });
    //   this.$refs.image.click();
    // }
  }
};
</script>