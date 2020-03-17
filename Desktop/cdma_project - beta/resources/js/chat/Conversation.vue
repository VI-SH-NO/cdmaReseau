<template>
  <div class="mesgs bg-white col-lg-8 col-md-8 col-sm-12">
    <div class="d-flex mb-1 justify-content-start border-bottom p-1" style="align-items: center;">
      <div class="incoming_msg_img">
        <img
          :src="contact.sender==auth.id?contact.receiver_avatar:contact.sender_avatar"
          style="border-radius:50%;"
        />
      </div>
      <h3 class="ml-2" v-text="contact.sender==auth.id?contact.receiver_name:contact.sender_name"></h3>
    </div>
    <div class="msg_history p-3 custom-scrollbar-css" ref="feed">
      <div v-for="message in messages" :key="message.id">
        <MessageSent :message="message" v-if="message.sender==auth.id"></MessageSent>

        <MessageReceived :message="message" v-else></MessageReceived>
      </div>
    </div>
    <!-- <ImageBox></ImageBox> -->
    <MessageField @sendMessage="sendMessage"></MessageField>
  </div>
</template>
<script>
import MessageField from "./MessageField";
import MessageSent from "./MessageSent";
import MessageReceived from "./MessageReceived";
import ImageBox from "./ImageBox";
export default {
  props: {
    contact: {
      type: Object,
      default: null
    }
  },
  data() {
    return {
      auth,
      messages: [],
      currentContact:
        this.contact.sender == auth.id
          ? this.contact.receiver
          : this.contact.sender
    };
  },
  mounted() {
    this.getMessages();
    this.listen();
  },
  watch: {
    contact() {
      this.getMessages();
      this.mark_seen();
      this.currentContact =
        this.contact.sender == auth.id
          ? this.contact.receiver
          : this.contact.sender;
    },
    messages() {
      this.mark_seen();
    }
  },
  methods: {
    listen() {
      var channel = Echo.channel("user." + this.auth.id);
      channel.listen(".conversation", response => {
        console.log(this.currentContact);
        if (this.currentContact == response.sender) {
          this.messages.push(response);
          this.scrollToBottom();
        }
      });
    },
    scrollToBottom() {
      setTimeout(() => {
        this.$refs.feed.scrollTop =
          this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
      }, 20);
    },
    getMessages() {
      axios
        .post("/api/conversation", {
          api_token: auth.api_token,
          contact:
            this.contact.sender == auth.id
              ? this.contact.receiver
              : this.contact.sender
        })
        .then(res => {
          this.messages = res.data;
          this.scrollToBottom();
        });
    },
    sendMessage(message) {
      if (message.length > 0) {
        axios
          .post("/api/conversation/message", {
            message: message,
            api_token: auth.api_token,
            receiver:
              this.contact.sender == auth.id
                ? this.contact.receiver
                : this.contact.sender
          })
          .then(res => {
            this.messages.push(res.data);
            this.scrollToBottom();
          });
      }
    },
    mark_seen() {
      this.count = 0;
      axios
        .post(`/api/messages/seen?api_token=${auth.api_token}`)
        .then(console.log("done"))
        .catch(e => {
          console.log(e);
        });
    }
  },
  components: {
    MessageField,
    MessageReceived,
    MessageSent,
    ImageBox
  }
};
</script>
<style lang="css">
/* scrollbar width */
.custom-scrollbar-css::-webkit-scrollbar {
  width: 5px;
}

/* scrollbar track */
.custom-scrollbar-css::-webkit-scrollbar-track {
  background: #eee;
}

/* scrollbar handle */
.custom-scrollbar-css::-webkit-scrollbar-thumb {
  border-radius: 1rem;
  background-color: #e44d3a;
  background-image: #e44d3a;
}
</style>