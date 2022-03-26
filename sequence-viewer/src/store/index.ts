import Vue from 'vue'
import Vuex from 'vuex'
import { VueSequence } from 'vue-sequence';

Vue.use(Vuex)

const baseStore = VueSequence.Store()

export default new Vuex.Store({
  ...baseStore,
  state: {
    ...baseStore.state,
    mode: 'view'
  },
  mutations: {
    ...baseStore.mutations,
    mode(state: any, payload: string) {
      state.mode = payload;
    }
  },
  actions: {
    ...baseStore.actions,
    setEditMode({commit}: any) {
      commit('mode', 'edit');
    },
    setViewMode({commit}: any) {
      commit('mode', 'view');
    },
    toggleMode({commit, state}: any) {
      commit('mode', state.mode === 'view' ? 'edit' : 'view');
    },
  },
  getters: {
    ...baseStore.getters,
    isEditMode(state: any) {
      return state.mode === 'edit';
    }
  }
})
