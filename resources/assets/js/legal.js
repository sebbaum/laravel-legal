import 'bootstrap';
import Vue from 'vue'
import VueFlashMessage from 'vue-flash-message';
import Editor from './Components/Editor.vue';



Vue.use(VueFlashMessage);

let vm = new Vue({
  el: '#legalApp',
  components: {
    editor: Editor
  }
});