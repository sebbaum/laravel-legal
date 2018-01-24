<template>
  <form @submit.prevent="save">
    <textarea id="editor" v-model="content">

    </textarea>
    <button type="submit" class="btn btn-dark" name="save">Save</button>
  </form>

</template>


<script>
  module.exports = {

    data: () => {
      return {
        simplemde: null,
        api: null,
        content: '# Terms Of Service'
      }
    },

    methods: {
      save: function() {
        let newContent = this.simplemde.value();
        alert(newContent);
        this.ping();
      },

      ping: function() {
        this.api.get('/legal/api/ping')
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    },

    mounted: function() {
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

