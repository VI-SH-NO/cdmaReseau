<template>
  <div class="border box">
    <img src="https://randomuser.me/api/portraits/men/99.jpg" alt />
  </div>
</template>
<script>
export default {
  props: {
    image: {
      type: Object
    }
  }
};
</script>
<style lang="css" scoped>
.box {
  display: flex;
  position: absolute;
  width: 91%;
  height: 20%;
  padding: 5px;
  text-align: center;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2px;
  bottom: 53px;
}

.box img {
  width: 17%;
  height: 95%;
}
</style>