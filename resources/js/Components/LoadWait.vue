<template>
  <div id="loadWait">
      <div v-if="show" class="z-999"><img src="../../icon/loading_wait.gif" alt=""></div>
  </div>
</template>

<script>

export default {
    el: "#LoadWait",
  props: {
    text: {
      default: "ロード中...",
      type: String,
    },
    show: {
      default: false,
      type: Boolean,
    },
  },

  template: '<div v-if="show"><img src="../../icon/loading_wait.gif">&nbsp;<span v-text="text"></span></div>'
};
</script>
