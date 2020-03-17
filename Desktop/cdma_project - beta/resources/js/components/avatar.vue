<template>
  <div class="user-pro-img">
    <img :src="`/${avatar}`" id="profilePicture" data-toggle="modal" data-target="#imagePicker" />
  </div>
</template>
<script>
export default {
  props: {
    avatar: {
      type: String
    }
  }
};
</script>
