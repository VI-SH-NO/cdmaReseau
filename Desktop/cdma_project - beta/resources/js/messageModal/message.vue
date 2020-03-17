<template>
  <div>
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn text-white lct-box-open"
      style="background-color:#e44d3a"
      data-toggle="modal"
      data-target="#exampleModalCenter"
    >
      <i class="fa fa-envelope"></i> Message
    </button>

    <!-- Modal -->
    <div class="overview-box" id="location-box" ref="modal">
      <div class="overview-edit position-relative mb-5">
        <h1 class="w-50 p-1">Contact Hamza</h1>
        <div class="row">
          <div class="col-12 p-3">
            <textarea
              name="12"
              id
              cols="30"
              rows="10"
              class="w-100 mb-3 border p-3"
              style="resize:none;border-color:#e44d3a;"
              v-model="message"
              placeholder="write something"
            ></textarea>
          </div>
        </div>
        <div class="col-12">
          <button
            class="text-white"
            style="background-color:#e44d3a; position: absolute;
    right: 0;
    bottom: -24px;"
            @click="sendMessage"
          >Envoyer</button>
        </div>
      </div>
      <a href="#" title class="close-box" ref="close">
        <i class="la la-close"></i>
      </a>
    </div>
    <!--overview-edit end-->
  </div>
</template>
<script>
export default {
  props: {
    receiver: {
      type: Object,
      default: null
    }
  },
  mounted() {
    console.log(this.receiver);
  },
  data() {
    return {
      message: ""
    };
  },
  methods: {
    sendMessage() {
      if (this.message.length > 0) {
        axios
          .post("/message", {
            message: this.message,
            receiver: this.receiver.id
          })
          .then(this.$refs.close.click());
        return;
      }
      alert("try again");
    }
  }
};
</script>