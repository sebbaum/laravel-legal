<template>
  <form>
    <textarea id="editor">

    </textarea>
    <button type="submit" class="btn btn-dark" name="save">Save</button>
  </form>

</template>


<script>
  module.exports = {

    data: function () {
      return {
        //
      }
    },

    mounted: () => {
      const SimpleMDE = require('simplemde');

      let simplemde = new SimpleMDE({
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

