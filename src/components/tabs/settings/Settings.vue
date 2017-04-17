<template>
  <div class="podlove-settings">
    <div class="podlove-settings--input">
      <h4>Volume</h4>
      <Slider min="0" max="1" value="1" step="0.01" :onInput="setVolume"></Slider>
      <div class="podlove-settings--range">
        <span class="podlove-settings--range--start">0%</span>
        <span class="podlove-settings--range--end">100%</span>
      </div>
    </div>
    <div class="podlove-settings--footer">
      <a class="podlove-settings--version" title="Export Debug State" :href="exportStore()" download="podlove-web-player-debug.json">Podlove Web Player v{{version}}</a>
    </div>
  </div>
</template>

<script>
  import store from 'store'
  import Slider from 'shared/Slider.vue'

  const exportStore = () => {
    return `data:text/json;charset=utf-8,${encodeURIComponent(JSON.stringify(store.store.getState()))}`;
  }

  const setVolume = volume => {
    store.dispatch(store.actions.setVolume(volume))
  }

  export default {
    data() {
      return {
         version: this.$select('debug.version')
      }
    },
    methods: {
      exportStore,
      setVolume
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

  .podlove-settings--range {
    display: flex;
    justify-content: space-between;
    font-size: 0.8rem;
    margin-top: $margin / -2;    
  }

  .podlove-settings--footer {
    text-align: right;
  }

  .podlove-settings--version {
    font-size: 0.8rem;
    color: #444;
  }
</style>
