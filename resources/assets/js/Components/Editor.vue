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

  // TODO extract API client

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
        this.api.post('/legal/api/documents', {
          id: this.id,
          type: this.type,
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

      fetchDocument: function () {
        /*
       * Fetch document
       */
        this.api.get('/legal/api/documents/' + this.type)
          .then(response => {
            console.log(response);
            this.id = response.data.id || '';
            this.content = response.data.content || '';
            this.type = response.data.type || this.type;
            this.simplemde.value(this.content);
          })
          .catch(error => {
            console.log(error);
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
        status: ['autosave'],
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

      this.api = require('axios');

      /*
       * Fetch document
       */
      this.api.get('/legal/api/documents/' + this.type)
        .then(response => {
          console.log(response);
          this.id = response.data.id;
          this.type = response.data.type;
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

