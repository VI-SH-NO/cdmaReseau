<template>
  <div class="chat_list" @click="selectContact" style="position:relative;">
    <div class="chat_people" style="
    display: flex;">
      <div class="chat_img">
        <img
          :src="contact.sender==auth.id?contact.receiver_avatar:contact.sender_avatar"
          alt="sunil"
          style="border-radius:50%;"
        />
      </div>
      <div class="chat_ib">
        <h5 v-text="contact.sender==auth.id?contact.receiver_name:contact.sender_name">
          <!-- <span :class="true?'d-none':'d-block'" class="chat_date" v-text="contact.created_at"></span> -->
        </h5>
        <p :class="notified?'font-weight-bold text-dark':''" v-text="contact.body"></p>
        <span v-if="notified" class="badge badge-light" style>
          <i class="fas fa-certificate" style="color: #e44d3a;"></i>
        </span>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    contact: {
      type: Object,
      default: null
    },
    index: {
      type: Number,
      default: null
    }
  },
  data() {
    return {
      selected: false,
      auth,
      currentContact:
        this.contact.sender == auth.id
          ? this.contact.receiver
          : this.contact.sender,
      notified: this.contact.seen_at == null && this.contact.sender != auth.id
    };
  },
  mounted() {
    this.listen();
  },
  methods: {
    selectContact() {
      setTimeout(() => {
        this.$emit("change", { index: this.index, contact: this.contact });
        this.notified = false;
      }, 100);
    },
    listen() {
      var channel = Echo.channel("user." + this.auth.id);
      channel.listen(".conversation", response => {
        if (this.currentContact == response.sender) {
          this.notified = true;
          this.contact.body = response.body;
        }
      });
    }
  }
};
</script>
<style lang="css" scoped>
.badge {
  position: absolute;
  left: 55px;
  top: 16px;
  background-color: rgb(228, 77, 58);
  border-radius: 50%;
  font-size: 6px;
}
</style>