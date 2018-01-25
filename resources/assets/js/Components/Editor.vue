<template>
  <div>
    <form @submit.prevent="save">
      <input type="hidden" v-model="id" name="id"/>
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
        id: '',
        updated_at: Date.now(),
        content: '# Terms Of Service',
      }
    },

    methods: {
      save: function () {
        let newContent = this.simplemde.value();
        // TODO send id to perform an update
        this.api.post('/legal/api/documents', {
          id: this.id,
          content: newContent
        })
          .then(response => {
            this.fm('Document saved', 'success');
            this.id = response.data.id;
            this.content = response.data.content;
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

      /*
       * Fetch document
       */
      this.api.get('/legal/api/documents')
        .then(response => {
          console.log(response);
          this.id = response.data.id;
          this.content = response.data.content;
          this.simplemde.value(response.data.content);
        })
        .catch(error => {
          console.log(error);
          this.fm('Document could not be loaded', 'error');
        });
    }
  };
</script>

