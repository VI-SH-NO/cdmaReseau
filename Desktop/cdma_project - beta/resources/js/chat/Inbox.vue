<template>
  <div class="inbox_people col-lg-4 col-md-4 col-sm-12 bg-white">
    <div class="headind_srch">
      <div class="recent_heading">
        <h4 style="color:#e44d3a; ">Chats</h4>
      </div>
      <div class="srch_bar">
        <div class="stylish-input-group">
          <input type="text" class="search-bar" placeholder="Search" />
        </div>
      </div>
    </div>
    <div class="inbox_chat custom-scrollbar-css">
      <!--active_chat -->

      <div v-if="contacts.length>0">
        <contact
          v-for="(contact,index) in contacts"
          :key="index"
          :contact="contact"
          :index="index"
          @change="changeContact"
          :class="selected===index?'active_chat':''"
        ></contact>
      </div>
      <h1
        v-else
        style="text-align: center;
    margin: 48px;
    font-weight: bolder;
"
      >No Conversations yet</h1>
    </div>
  </div>
</template>

<script>
import contact from "./contact";
export default {
  props: {
    contacts: {
      type: Array,
      default: null
    }
  },
  data() {
    return {
      selected: 0
    };
  },
  methods: {
    changeContact(payload) {
      this.selected = payload.index;
      this.$emit("change", payload.contact);
    }
  },
  components: {
    contact
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