<template>
  <form @submit.prevent="save">
    <textarea id="editor" v-model="text">

    </textarea>
    <button type="submit" class="btn btn-dark" name="save">Save</button>
  </form>

</template>


<script>
  module.exports = {

    data: () => {
      return {
        simplemde: null,
        content: 'Terms Of Service'
      }
    },

    methods: {
      save: () => {
        let newContent = this.simplemde.value();
        alert(newContent);
      }
    },

    mounted: () => {
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

    }
  };
</script>

