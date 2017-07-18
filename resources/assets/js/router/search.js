import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import content from 'components/search-view/_content.vue';
import people from 'components/search-view/_people.vue';
import topic from 'components/search-view/_topic.vue';


const routes = [
    { path: '/', redirect: '/content' },
    { path: '/content', component: content },
    { path: '/people', component: people },
    { path: '/topic', component: topic }
];

export default new VueRouter({
    routes
})
