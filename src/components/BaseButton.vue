<template>
  <div class="button-div">
    <button class="button"><slot></slot></button>
  </div>
</template>

<script>
export default {}
</script>

<style lang="scss" scoped>
.button-div {
  height: 1.5rem;
  width: 2.5rem;
  .button {
    width: 100%;
    height: 100%;
    text-align: center;
    background-color: white;
    color: #0062ff;
    :focus {
      border: none;
    }
    :hover {
      background-color: #0062ff;
      color: white;
    }
  }
}
</style>
