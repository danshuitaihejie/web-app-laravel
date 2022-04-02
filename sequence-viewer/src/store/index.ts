import Vue from 'vue'
import Vuex from 'vuex'
import { VueSequence } from 'vue-sequence';

Vue.use(Vuex)

const baseStore = VueSequence.Store();
const store = {
  ...baseStore,
  state: {
    ...baseStore.state,
    mode: 'view',
    modeListeners: []
  },
  mutations: {
    ...baseStore.mutations,
    mode(state: any, payload: string) {
      state.mode = payload;
    },
    modeListeners(state: any, payload: Array<any>) {
      state.modeListeners = payload;
    },
  },
  actions: {
    ...baseStore.actions,
    setEditMode({commit, state}: any) {
      commit('mode', 'edit');
      state.modeListeners.filter((l: any) => l.mode === 'edit').forEach((l: any) => l.payload());
    },
    setViewMode({commit, state}: any) {
      commit('mode', 'view');
      state.modeListeners.filter((l: any) => l.mode === 'view').forEach((l: any) => l.payload());
    },
    toggleMode({commit, state}: any) {
      state.mode === 'view'
        ? store.actions.setEditMode({commit, state})
        : store.actions.setViewMode({commit, state});
    },
    registerEditModeListener({commit, state}: any, payload: any) {
      state.modeListeners.push({mode: 'edit', payload});
      commit('modeListeners', state.modeListeners);
    },
    registerViewModeListener({commit, state}: any, payload: any) {
      state.modeListeners.push({mode: 'view', payload});
      commit('modeListeners', state.modeListeners);
    },
  },
  getters: {
    ...baseStore.getters,
    isEditMode(state: any) {
      return state.mode === 'edit';
    }
  }
};

export default new Vuex.Store(store)
