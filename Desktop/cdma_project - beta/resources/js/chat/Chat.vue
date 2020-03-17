<template>
  <div class="bg-white row">
    <Inbox :contacts="contacts" @change="change"></Inbox>
    <Conversation :contact="selectedContact" v-if="selectedContact"></Conversation>
  </div>
</template>

<script>
import Conversation from "./Conversation";
import Inbox from "./Inbox";
export default {
  data() {
    return {
      auth,
      contacts: [],
      selectedContact: null
    };
  },
  mounted() {
    axios
      .get(`/api/messages/contacts?api_token=${auth.api_token}`)
      .then(Response => {
        this.contacts = Response.data;
        this.selectedContact = this.contacts[0];
        // console.log(this.contacts);
      })
      .catch(e => console.log(e));
  },
  components: {
    Conversation,
    Inbox
  },
  methods: {
    change(contact) {
      this.selectedContact = contact;
    }
  }
};
</script>