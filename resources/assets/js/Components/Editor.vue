<template>
  <div>
    <form @submit.prevent="save">
      <input type="hidden" v-model="id" name="id"/>
      <div class="form-group">
        <select class="form-control form-control-lg" v-model="type" name="type" title="type" @change="fetchDocument">
          <option value="imprint">Imprint</option>
          <option value="tos">Terms Of Service</option>
          <option value="pripol">Privacy Policy</option>
        </select>
      </div>

      <div class="form-group">
        <textarea title="editor" id="editor" v-model="content"></textarea>
      </div>
      <button type="submit" class="btn btn-dark" name="save">Save</button>
    </form>
    <flash-message class="flashMessage"></flash-message>
  </div>

</template>


<script>
  let api = require('../Services/apiClient.js');

  module.exports = {

    data: function() {
      return {
        simplemde: null,
        api: null,
        id: '',
        updated_at: Date.now(),
        content: '',
        type: 'imprint'
      }
    },

    methods: {
      save: function () {
        let newContent = this.simplemde.value();
        api.saveDocument({
          id: this.id,
          type: this.type,
          content: newContent
        }, (response) => {
          this.fm('Document saved', 'success');
          this.id = response.data.id;
          this.content = response.data.content;

        }, (error) => {
          this.fm('Document could not be saved', 'error');
        });
      },

      fetchDocument: function () {
        api.fetchDocument(this.type, (response) => {

            this.id = response.data.id || '';
            this.content = response.data.content || '';
            this.type = response.data.type || this.type;
            this.simplemde.value(this.content);
          },(error) => {
            console.error(error.content);
            this.fm('Document could not be loaded', 'error');
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
        spellChecker: false,
        forceSync: false,
        status: [],
        renderingConfig: {
          /*
           * laravel-markdown configuration is also possible
           * 'renderer' => [
           *    'block_separator' => "\n",
           *    'inner_separator' => "\n",
           *    'soft_break'      => "<br>",
           * ],
           */
          singleLineBreaks: false
        }
      });

      /*
      * Fetch document
      */
      api.fetchDocument(this.type, (response) => {
        this.id = response.data.id || '';
        this.content = response.data.content || '';
        this.type = response.data.type || this.type;
        this.simplemde.value(this.content);
      },(error) => {
        this.fm('Document could not be loaded', 'error');
      });
    }
  };
</script>

