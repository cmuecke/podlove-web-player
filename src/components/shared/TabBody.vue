<template>
  <div class="podlove-tabs--tab-body gradient" :class="{active}">
    <slot></slot>
  </div>
</template>
<script>
  export default {
    props: ['active']
  }
</script>
<style lang="scss">
  @import 'variables';

  .podlove-tabs--tab-body {
    max-height: 0;
    overflow: hidden;
    background-color: $background-color;

    &.active {
      max-height: $tabs-body-max-height;
      overflow-y: auto;
    }

    &.gradient::before {
      position: relative;
      content: ' ';
      display: block;
      height: 13px;
      background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%);
      z-index: 100;
    }

    &.gradient::after {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      content: ' ';
      display: block;
      height: 13px;
      background: linear-gradient(to top, white 0%, rgba(255, 255, 255, 0) 100%);
      z-index: 100;
    }
  }
</style>
