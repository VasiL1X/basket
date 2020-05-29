<template>
  <div id="app">
    <loading ref="loading" />
    <transition name="page" mode="out-in">
      <component :is="layout" v-if="layout" />
    </transition>
  </div>
</template>

<script>
import Loading from './Loading'

// Load layout components dynamically.
const requireContext = require.context('~/layouts', false, /.*\.vue$/)

const layouts = requireContext.keys()
  .map(file =>
    [file.replace(/(^.\/)|(\.vue$)/g, ''), requireContext(file)]
  )
  .reduce((components, [name, component]) => {
    components[name] = component.default || component
    return components
  }, {})

export default {
  el: '#app',

  components: {
    Loading
  },

  data: () => ({
    layout: null,
    defaultLayout: 'default',
    basicLayouts: 'layouts',
  }),

  metaInfo () {
    const { appName } = window.config

    return {
      title: appName,
      titleTemplate: `%s · ${appName}`
    }
  },

  mounted () {
    this.$loading = this.$refs.loading
  },

  methods: {
    /**
     * Set the application layout.
     *
     * @param {String} layout
     */
    setLayout (layout) {
      if (!layout || !layouts[layout]) {
        layout = this.defaultLayout
      }

      this.layout = layouts[layout]
    },

    setLayoutBasic (layout) {
      if (!layout || !layouts[layout]) {
        layout = this.basicLayouts
      }

      this.layout = layouts[layout]
    }
  }
}
</script>

<style>
    .loading {
        text-align: center;
        position: fixed;
        color: #fff;
        z-index: 9;
        padding: 8px 18px;
        border-radius: 5px;
        left: 0%;
        top: 0%;
        font-size: 40px;
    }

    .error-message{
        color: red;
    }
</style>
