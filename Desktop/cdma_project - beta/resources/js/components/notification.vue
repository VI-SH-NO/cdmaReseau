<template>
  <div>
    <h6 href="#" title class="not-box-open not" @click="mark_seen()">
      <span>
        <i class="badge1 fa fa-bell"></i>
        <span v-if="count > 0" v-text="this.count" class="count"></span>
      </span>
      Notification
    </h6>
    <div class="notification-box noti" id="notification" style="display:none !important;">
      <div class="nt-title">
        <h4>Setting</h4>
        <a href="#" title>Clear all</a>
      </div>
      <div class="nott-list custom-scrollbar-css" style="overflow-y: scroll;
  max-height: 400px;">
        <div class="notfication-details" v-for="not in nots" :key="not.id">
          <div class="noty-user-img">
            <img :src="not.sender_avatar" alt />
          </div>
          <div class="notification-info">
            <h3>
              <a href="#" v-text="not.sender_name"></a>
              {{not.body}}
            </h3>
            <span v-text="not.created_at" style="    bottom: -12px !important;"></span>
          </div>
          <!--notification-info -->
        </div>

        <div class="view-all-nots">
          <a href="#" title>View All Notification</a>
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
      nots: [],
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
      channel.listen(".notif", response => {
        this.nots.unshift(response);
        this.count++;
      });
    },
    getNotification() {
      axios
        .post(`/notifications`)
        .then(response => {
          this.nots = Array.from(response.data);
          this.count = this.nots.filter(not => !not.seen_at).length;
        })
        .catch(e => {
          console.log(e);
        });
      return;
    },
    mark_seen() {
      this.count = 0;
      axios
        .post(`/notifications_seen`)
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
