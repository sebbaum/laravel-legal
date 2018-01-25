<template>
  <div>
    <form @submit.prevent="save">
      <textarea id="editor" v-model="content"></textarea>
      <button type="submit" class="btn btn-dark" name="save">Save</button>
    </form>
    <flash-message class="flashMessage"></flash-message>
  </div>

</template>


<script>

  module.exports = {

    data: function() {
      return {
        simplemde: null,
        api: null,
        content: '# Terms Of Service',
      }
    },

    methods: {
      save: function () {
        let newContent = this.simplemde.value();
        this.api.post('/legal/api/document', {
          content: this.content
        })
          .then(response => {
            this.fm('Document saved', 'success');
          })
          .catch(error => {
            // console.log(error);
            this.fm('Document could not be saved', 'error');
          });
      },

      fm: function (message, type) {
        this.flash(message, type, {
          timeout: 5000
        })
      }

      // ping: function () {
      //   this.api.get('/legal/api/ping')
      //     .then(response => {
      //       console.log(response.data);
      //       this.content = response.data;
      //       this.simplemde.value(response.data);
      //     })
      //     .catch(error => {
      //       console.log(error);
      //     });
      // }
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

