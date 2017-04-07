/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/
Vue.component('pagination', require('./components/common/pagination.vue'));
Vue.component('search', require('./components/common/search.vue'));
Vue.component('notification', require('./components/common/notification.vue'));
Vue.component('button-delete', require('./components/common/button-delete.vue'));

/**
* Vue Router
*
* @link http://router.vuejs.org/en/installation.html
*/
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// define routes for users
const routes = [
  {
    path: '/',
    name: 'index',
    component: require('./components/404.vue')
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: require('./components/dashboard.vue')
  },
  {
    path: '/user',
    name: 'user.index',
    component: require('./components/user/index.vue')
  },
  {
    path: '/user/create',
    name: 'user.create',
    component: require('./components/user/create.vue')
  },
  {
    path: '/user/:id',
    name: 'user.profile',
    component: require('./components/user/profile.vue')
  },
  {
    path: '/user/:id/edit',
    name: 'user.edit',
    component: require('./components/user/edit.vue')
  }
]

// demo components
const demo = [
  {
    path: '/table',
    name: 'demo.table',
    component: require('./components/dashboard.vue')
  }
];

const router = new VueRouter({ routes });

// set default route
router.replace({ name: 'dashboard' });

/*
 * By extending the Vue prototype with a new '$bus' property
 * we can easily access our global event bus from any child component.
 *
 * @link https://laracasts.com/discuss/channels/vue/use-a-global-event-bus
 */
Object.defineProperty(Vue.prototype, '$bus', {
    get() {
        return this.$root.bus;
    }
});

window.bus = new Vue({});

window.app = new Vue({
  router,
  data: {
    bus: bus,
    page: {
      title: Laravel.app.name,
      icon: 'fa-dashboard'
    },
  	app: {
  		name: Laravel.app.name,
  		auth: Laravel.app.auth,
      user: Laravel.app.user
  	}
  }
}).$mount('#app');