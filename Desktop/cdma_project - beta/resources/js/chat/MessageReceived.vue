<template>
  <div class="incoming_msg" @click="showDate=!showDate">
    <div class="incoming_msg_img">
      <img :src="message.sender_avatar" alt="sunil" style="border-radius:50%" />
    </div>
    <div class="received_msg">
      <div class="received_withd_msg">
        <p v-text="message.body">
          Test which is a new approach to have all
          solutions
        </p>
        <span class="time_date float-right" v-text="message.created_at" v-if="showDate"></span>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    message: {
      type: Object
    }
  },
  data() {
    return {
      showDate: false
    };
  }
};
</script>