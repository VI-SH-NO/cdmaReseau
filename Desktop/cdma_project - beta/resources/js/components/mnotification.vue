olons<template>
  <div>
    <h6 href="#" title class="not-box-openm not" @click="mark_seen()">
      <span>
        <i class="fa fa-envelope"></i>
        <span v-if="count > 0" v-text="this.count" class="count"></span>
      </span>
      Messages
    </h6>
    <div class="notification-box msg" id="message">
      <div class="nt-title">
        <h4>Setting</h4>
        <a href="#" title>Clear all</a>
      </div>
      <div class="nott-list custom-scrollbar-css" style="overflow-y: scroll;
  max-height: 400px;">
        <div class="notfication-details" v-for="message in messages" :key="message.id">
          <div class="noty-user-img">
            <a :href="`/u/${message.sender===auth.id?message.receiver:message.sender}`">
              <img :src="message.sender==auth.id?message.receiver_avatar:message.sender_avatar" alt />
            </a>
          </div>
          <div class="notification-info">
            <h3>
              <a
                :href="`/u/${message.sender===auth.id?message.receiver:message.sender}`"
                v-text="message.sender===auth.id?message.receiver_name:message.sender_name"
              ></a>
            </h3>
            <p v-text="message.body"></p>
            <span
              v-text="message.created_at"
              style="font-size:10px !important ; top:-12px !important;"
            ></span>
          </div>
          <!--notification-info -->
        </div>
        <div class="view-all-nots">
          <a href="/chat" title>View All Messsages</a>
        </div>
      </div>
      <!--nott-list end-->
    </div>
    <!--notification-box end-->
  </div>
</template>
<script>
export default {
  data() {
    return {
      messages: [],
      count: 0,
      auth
    };
  },
  mounted() {
    this.listen();
    this.getNotification();
  },
  methods: {
    listen() {
      var channel = Echo.channel("user." + this.auth.id);
      channel.listen(".message", response => {
        this.messages.unshift(response);
        this.count++;
      });
    },
    getNotification() {
      axios
        .get(`/messages`)
        .then(response => {
          this.messages = Array.from(response.data);
          this.count = this.messages.filter(
            message => !message.seen_at && message.sender != auth.id
          ).length;
        })
        .catch(e => {
          console.log(e);
        });
      return;
    },
    mark_seen() {
      this.count = 0;
      axios
        .post(`/messages_seen`)
        .then(console.log("done"))
        .catch(e => {
          console.log(e);
        });
    }
  }
};
</script>
<style lang="css">
.count {
  position: absolute;
  top: 5px;
  right: 23px;
  font-size: 14px;
  background: white;
  color: red;
  width: 15px;
  height: 17px;
  text-align: center;
  line-height: 18px;
  border-radius: 50%;
  box-shadow: 0 0 1px #333;
}
.not {
  color: #ffffff;
  cursor: pointer;
  font-size: 13px;
}
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
