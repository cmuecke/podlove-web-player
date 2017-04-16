<template>
  <div class="podlove-settings">
    <div class="podlove-settings--input">
      <label>Volume</label>
      <Slider min="50" max="150" value="100"></Slider>
    </div>
    <div class="podlove-settings--footer">
      <a class="podlove-settings--version" title="Export Debug State" :href="exportStore()" download="podlove-web-player-debug.json">Podlove Web Player v{{version}}</a>
    </div>
  </div>
</template>

<script>
  import Slider from 'shared/Slider.vue'

  import store from 'store'

  const exportStore = () => {
    return `data:text/json;charset=utf-8,${encodeURIComponent(JSON.stringify(store.store.getState()))}`;
  }

  export default {
    data() {
      return {
         version: this.$select('debug.version')
      }
    },
    methods: {
      exportStore
    },
    components: {
      Slider
    }
  }
</script>

<style lang="scss">
  @import 'variables';

  .podlove-settings {
    width: 100%;
    padding: $padding;
  }

  .podlove-settings--footer {
    text-align: right;
  }

  .podlove-settings--version {
    font-size: 0.8rem;
    color: #444;
  }
</style>
