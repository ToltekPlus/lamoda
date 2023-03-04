import Vue from '../nodejs/node_modules/vue';
import App from '../nodejs/src/App.vue'

new Vue({
    render: h => h(App)
}).$mount('#app')