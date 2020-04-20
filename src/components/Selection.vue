<template>
  <div class="container">
    <div class="product">
      <div class="image">{{ product.images[0].src }}</div>
      <h4 class="name">{{ product.name }}</h4>
      <p class="price">€{{ product.price }}.00</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    product: Object
  }
}
</script>

<style lang="scss" scoped>
@import '@/assets/styles/_variables.scss';
.container {
  display: flex;
  flex: 1;
  box-sizing: border-box;
  .product {
    display: flex;
    flex-flow: column wrap;
    text-align: left;
    width: fit-content;
    height: auto;
    /* padding: 2rem; */
    box-sizing: border-box;
    .image {
      margin-bottom: 1rem;
    }
    .name {
      color: $productTitle;
      margin-bottom: 0;
      line-height: 1;
      font-size: 1rem;
    }
    .price {
      color: $priceText;
      text-align: left;
      font-size: $xxl;
      margin-top: 0;
    }
  }
}
</style>
