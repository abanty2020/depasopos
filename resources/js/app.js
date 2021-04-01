// require('./bootstrap');
window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);

// Componentes Principales
Vue.component('categoria-component', require('./components/Categorias.vue').default);

const app = new Vue({
    el: '#app',
    data: {       
        menu:0
      },
});
