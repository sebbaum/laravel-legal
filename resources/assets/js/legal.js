const Vue = require('vue');
const Editor = require('./Components/Editor.vue');



let vm = new Vue({
  el: '#legalApp',
  components: {
    editor: Editor
  }
});