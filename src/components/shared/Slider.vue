<template>
  <div class="podlove-player--slider">
    <input
        type="range"
        :min="minValue"
        :max="maxValue"
        :value="value"
        :step="sliderSteps"
        v-on:input="onSliderInput"
        v-on:change="onSliderChange"
      />
    <span class="podlove-player--slider--track"></span>
    <span class="podlove-player--slider--thumb" :style="{left: thumbPosition}"></span>
  </div>
</template>

<script>
  import { isUndefined } from 'lodash'

  const relativePosition = (current = 0, minimum = 0, maximum = 0) =>
    (((parseFloat(current, 10) - parseFloat(minimum, 10)) * 100) / (parseFloat(maximum, 10) - parseFloat(minimum, 10))) + '%'

  export default {
    props: ['min', 'max', 'step', 'value', 'onChange', 'onInput'],
    data () {
      return {
        thumbPosition: relativePosition(this.value, this.min || 0, this.max || 100)
      }
    },
    computed: {
      minValue: function () {
        return isUndefined(this.min) ? 0 : this.min
      },
      maxValue: function () {
        return isUndefined(this.max) ? 100 : this.max
      },
      sliderSteps: function () {
        return isUndefined(this.step) ? 0.1 : this.step
      }
    },
    mounted: function () {
      this.thumbPosition = relativePosition(this.value, this.minValue, this.maxValue)
    },
    methods: {
      onSliderInput: function (event) {
        this.thumbPosition = relativePosition(event.target.value, this.minValue, this.maxValue)
        this.onInput && this.onInput(event.target.value)
      },
      onSliderChange: function (event) {
        this.onChange && this.onChange(event.target.value)
      }
    }
  }
</script>

<style lang="scss">
  @import 'variables';
  $slider-height: 15px;

  .podlove-player--slider {
    height: $slider-height;
    margin: ($margin / 3) 0;
    position: relative;

    .podlove-player--slider--track {
      display: block;
      width: 100%;
      position: absolute;
      left: 0;
      top: 2px;
      height: 2px;
      pointer-events: none;
      background-color: rgba($accent-color, 0.5);
    }

    .podlove-player--slider--thumb {
      position: absolute;
      top: 0;
      border: 1px solid;
      margin-top: -5px;
      height: 14px;
      width: 6px;
      pointer-events: none;
      background-color: rgba($accent-color, 0.9);
      border: 1px solid $background-color;
    }
  }
</style>
