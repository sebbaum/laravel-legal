<template>
  <form>
    <textarea id="editor">

    </textarea>
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
          uniqueId: "MyUniqueID",
          delay: 1000,
        },
        element: document.getElementById("editor"),
        spellChecker: false
      });
    }
  };
</script>

