require("./bootstrap");

window.Vue = require("vue");
import Vuetify from "./plugins/vuetify";
import { store } from "./store";

Vue.component("Follow", require("./components/follow.vue").default);
Vue.component("Home", require("./views/Home.vue").default);
Vue.component("Profile", require("./views/profile.vue").default);
Vue.component("Search", require("./search/search.vue").default);
Vue.component("Notification", require("./components/notification.vue").default);
Vue.component("pfeed", require("./feed/pfeed.vue").default);
Vue.component("Client", require("./client/client.vue").default);
Vue.component("Message", require("./messageModal/message.vue").default);
Vue.component(
    "mnotification",
    require("./components/mnotification.vue").default
);
Vue.component("Chat", require("./chat/chat.vue").default);

const app = new Vue({
    el: "#app",
    vuetify: Vuetify,
    store
});
