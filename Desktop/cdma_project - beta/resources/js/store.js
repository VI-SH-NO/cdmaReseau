import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);
export const store = new Vuex.Store({
    state: {
        posts: []
    },
    mutations: {
        addPosts: (state, posts) => {
            state.posts.push(...posts);
        },
        addPost: (state, post) => {
            state.posts.unshift(post);
        }
    }
});
