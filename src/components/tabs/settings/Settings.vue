<template>
  <div class="podlove-settings">
    <div class="podlove-settings--input">
      <h4>Volume</h4>
      <PodloveSlider min="0" max="1" :value="volume" step="0.001" :onInput="setVolume"></PodloveSlider>
      <div class="podlove-settings--range">
        <span class="podlove-settings--range--start">0%</span>
        <span class="podlove-settings--range--end">100%</span>
      </div>
    </div>
    <div class="podlove-settings--input">
      <h4 class="podlove-settings--label">
        <span class="podlove-settings--title">Rate</span>
        <div>
          <PodloveButton class="solid podlove-settings--preset" :class="{active: rate > 0.75 && rate < 0.85}" :click="fixedRate(0.8)">0.8x</PodloveButton>
          <PodloveButton class="solid podlove-settings--preset" :class="{active: rate > 0.95 && rate < 1.05}" :click="fixedRate(1)">1x</PodloveButton>
          <PodloveButton class="solid podlove-settings--preset" :class="{active: rate > 1.45 && rate < 1.55}" :click="fixedRate(1.5)">1.5x</PodloveButton>
          <PodloveButton class="solid podlove-settings--preset" :class="{active: rate > 1.95 && rate < 2.05}" :click="fixedRate(2)">2x</PodloveButton>
          <PodloveButton class="solid podlove-settings--preset" :class="{active: rate > 2.95 && rate < 3.05}" :click="fixedRate(3)">3x</PodloveButton>
        </div>
      </h4>
      <PodloveSlider min="0.5" max="4" :value="rate" step="0.001" :onInput="setRate"></PodloveSlider>
      <div class="podlove-settings--range">
        <span class="podlove-settings--range--start">0.5x</span>
        <span class="podlove-settings--range--end">4x</span>
      </div>
    </div>
    <div class="podlove-settings--footer">
      <a class="podlove-settings--version" title="Export Debug State" :href="exportStore()" download="podlove-web-player-debug.json">Podlove Web Player v{{version}}</a>
    </div>
  </div>
</template>

<script>
  import store from 'store'
  import PodloveSlider from 'shared/Slider.vue'
  import PodloveButton from 'shared/Button.vue'

  const exportStore = () => {
    return `data:text/json;charset=utf-8,${encodeURIComponent(JSON.stringify(store.store.getState()))}`;
  }

  const setVolume = volume => {
    store.dispatch(store.actions.setVolume(volume))
  }

  const setRate = rate => {
    store.dispatch(store.actions.setRate(rate))
  }

  const fixedRate = rate => () => setRate(rate)

  export default {
    data() {
      return {
        volume: this.$select('volume'),
        rate: this.$select('rate'),
        version: this.$select('debug.version')
      }
    },
    methods: {
      exportStore,
      setVolume,
      setRate,
      fixedRate
    },
    components: {
      PodloveSlider,
      PodloveButton
    }
  }
</script>

<style lang="scss">
  @import 'variables';

  $preset-width: 40px;

  .podlove-settings {
    width: 100%;
    padding: $padding;
  }

  .podlove-settings--range {
    display: flex;
    justify-content: space-between;
    font-size: 0.9rem;
    margin-top: $margin / -2;
  }

  .podlove-settings--input {
    border-bottom: 1px dashed rgba($accent-color, 0.2);
    padding-bottom: $padding * 2;
  }

  .podlove-settings--footer {
    padding: $padding 0;
    text-align: right;
  }

  .podlove-settings--version {
    font-size: 0.8rem;
    color: #444;
  }

  .podlove-settings--label {
    display: flex;
    justify-content: space-between;
  }

  .podlove-settings--preset {
    width: $preset-width;
  }
</style>
