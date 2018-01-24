<template>
  <div>
    <form @submit.prevent="save">
      <textarea id="editor" v-model="content"></textarea>
      <button type="submit" class="btn btn-dark" name="save">Save</button>
    </form>

    <h3>Output</h3>
    <div id="output" v-html="marked">{{ marked }}</div>
  </div>

</template>


<script>
  const marked = require('marked');

  module.exports = {

    data: function() {
      return {
        simplemde: null,
        api: null,
        content: '# Terms Of Service',
      }
    },

    computed: {
      marked: function() {
        return marked(this.content)
      }
    },

    methods: {
      save: function () {
        let newContent = this.simplemde.value();
        this.ping();
      },

      ping: function () {
        this.api.get('/legal/api/ping')
          .then(response => {
            console.log(response.data);
            this.content = response.data;
            this.simplemde.value(response.data);
          })
          .catch(error => {
            console.log(error);
          });
      }
    },

    mounted: function () {
      const SimpleMDE = require('simplemde');

      this.simplemde = new SimpleMDE({
        autosave: {
          enabled: true,
          uniqueId: "legal::editor",
          delay: 1000,
        },
        element: document.getElementById("editor"),
        spellChecker: false
      });


      this.api = require('axios');

    }
  };
</script>

