<template>
  <div>
    <video :src="video" width="550" height="250" controls></video>
  </div>
</template>

<script>
export default {
  props: {
    video: ""
  }
};
</script>