<template>
  <div id="app">
    <Workspace v-show="isEditMode" />
    <Viewer v-show="isViewMode" />
  </div>
</template>

<script lang="ts">
import Workspace from './views/Workspace.vue'
import Viewer from './views/Viewer.vue'
import { Component, Vue } from 'vue-property-decorator';

// @ts-ignore
@Component({
  computed: {
    isEditMode() {
      return this.$store.getters.isEditMode;
    },
    isViewMode() {
      return !this.$store.getters.isEditMode;
    }
  },
  components: {
    Workspace,
    Viewer
  },
})
export default class App extends Vue {}
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
