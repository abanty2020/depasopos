// require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import ToggleButton from 'vue-js-toggle-button'

Vue.use(ToggleButton)

const bsTooltip = (el, binding) => {
  const t = []

  if (binding.modifiers.focus) t.push('focus')
  if (binding.modifiers.hover) t.push('hover')
  if (binding.modifiers.click) t.push('click')
  if (!t.length) t.push('hover')

  $(el).tooltip({
    title: binding.value,
    placement: binding.arg || 'top',
    trigger: t.join(' '),
    html: !!binding.modifiers.html,
  });
}

Vue.directive('tooltip', {
  bind: bsTooltip,
  update: bsTooltip,
  unbind (el) {
    $(el).tooltip('dispose')
  }
});


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);

// Componentes Principales
Vue.component('categoria-component', require('./components/Categorias.vue').default);

const app = new Vue({
    el: '#app',
    data: {       
        menu:0
    },
    mounted() {
      // $('select').select2();     
    },   
});
