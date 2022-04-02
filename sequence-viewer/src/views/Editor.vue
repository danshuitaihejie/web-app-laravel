<template>
  <div class="editor">
    <div class="body">
      <codemirror class="dsl-editor"
        ref="myCm"
        :code="code"
        :options="cmOptions"
        @input="onEditorCodeChange">
      </codemirror>
    </div>
  </div>

</template>

<script>
  import _ from 'lodash'
  import { codemirror } from 'vue-codemirror'
  import 'codemirror/keymap/sublime'
  // language js
  import 'codemirror/mode/javascript/javascript.js'
  import 'codemirror/addon/display/placeholder.js'
  import 'codemirror/addon/edit/closebrackets.js'

  export default {
    name: 'Editor',
    data() {
      return {
        cmOptions: {
          tabSize: 2,
          mode: 'text/javascript',
          theme: 'monokai',
          lineNumbers: true,
          line: true,
          keyMap: "sublime",
          extraKeys: {"Ctrl": "autocomplete"},
          foldGutter: true,
          gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
          styleSelectedText: true,
          highlightSelectionMatches: {showToken: /\w/, annotateScrollbar: true},
          placeholder: 'Write you code here',
          autoCloseBrackets: true,
        }
      }
    },
    methods: {
      onEditorCodeChange: function (newCode) {
        if(this.$store.getters.isEditMode) {
          this.$store.dispatch('updateCode', {code: newCode});
        }
      },
    },
    computed: {
      editor() {
        return this.$refs.myEditor.Editor
      },
      code() {
        return this.$store.getters.isEditMode ? this.$store.state.code : '';
      },
      codemirror() {
        return this.$refs.myCm.codemirror
      },
    },
    mounted() {
      this.codemirror.on('cursorActivity',_.debounce(() => {
        if (this.mark) {
          this.mark.clear()
        }
        const cursor = this.codemirror.getCursor();
        const line = cursor.line;
        let pos = cursor.ch;

        for (let i = 0; i < line; i++) {
          pos += this.codemirror.getLine(i).length + 1
        }
        this.$store.state.cursor = pos
      }, 500));

    },
    components: {codemirror}
  }
</script>

<style>
  @import "~codemirror/lib/codemirror.css";
  @import "~codemirror/theme/monokai.css";
  .CodeMirror pre.CodeMirror-placeholder {
    color: #777;
  }

  .dsl-editor .CodeMirror * {
    font-family: Menlo, 'Fira Code', Monaco, source-code-pro, "Ubuntu Mono", "DejaVu sans mono", Consolas, monospace;
    font-size: 16px;
  }

</style>


<style scoped>

  .editor {
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .header, .body {
    display: flex;
    justify-content: space-between;
  }

  .body {
    height: 100%;
    min-height: 600px;
  }

  .Editor-subheader {
    background: #252526;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: default;
    font-family: Lato,sans-serif;
  }

  .FilePath {
    white-space: nowrap;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: #777;
    padding: 0 16px;
    font-size: 13px;
  }

  .Editor-subheader .prettify-btn {
    padding: 5px;
    cursor: pointer;
    position: relative;
    text-transform: uppercase;
    font-size: 11px;
    letter-spacing: .5px;
    font-weight: 600;
    color: #fff;
    margin-right: 11px;
    opacity: .4;
  }
  .dsl-editor {
    flex: 1;
    background: red;
  }

  .dsl-editor >>> .CodeMirror {
    height: 100%;
  }

</style>