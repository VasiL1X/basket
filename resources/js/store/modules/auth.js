import axios from 'axios'
import Cookies from 'js-cookie'
import * as types from '../mutation-types'

// state
export const state = {
  user: null,
  token: Cookies.get('token'),
  userData: Cookies.get('userData'),
}



// getters
export const getters = {
  user: state => state.userData,
  token: state => state.token,
  check: state => (state.userData !== null) && (state.userData !== undefined) && (state.userData !== {})
}

// mutations
export const mutations = {
  [types.SAVE_TOKEN] (state, { token, remember }) {
    state.token = token
    Cookies.set('token', token, { expires: remember ? 365 : null })

  },

  [types.FETCH_USER_SUCCESS] (state, { user }) {
      Cookies.set('userData', user)
      state.userData = Cookies.get('userData')
  },

  [types.FETCH_USER_FAILURE] (state) {
    state.token = null
    Cookies.remove('token')
  },

  [types.LOGOUT] (state) {
    state.user = null
    state.token = null
    state.userData = null

    Cookies.remove('token')
  },

  [types.UPDATE_USER] (state, { user }) {
    state.user = user
  }
}




// actions
export const actions = {
  saveToken ({ commit, dispatch }, payload) {
    commit(types.SAVE_TOKEN, payload)
  },

  fetchUser ({ commit, dispatch }, payload) {
    commit(types.FETCH_USER_SUCCESS, { user: payload })
  },

  updateUser ({ commit }, payload) {
    commit(types.UPDATE_USER, payload)
  },

  async logout ({ commit }) {

    commit(types.LOGOUT)
  },

}
