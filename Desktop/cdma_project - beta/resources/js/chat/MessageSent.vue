<template>
  <div class="outgoing_msg" @click="showDate=!showDate">
    <div class="sent_msg">
      <p v-text="message.body"></p>
      <span class="time_date" v-text="message.created_at" v-if="showDate"></span>
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