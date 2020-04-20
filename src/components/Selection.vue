<template>
  <div class="product">
    <div>{{ product.images[0].src }}</div>
    <h3 class="name">{{ product.name }}</h3>
    <p class="price">€{{ product.price }}.00</p>
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

.product {
  display: flex;
  flex-flow: column wrap;
  text-align: left;
  height: auto;
  padding: 2rem;
}
.name {
  color: $productTitle;
  margin-bottom: 0;
}
.price {
  color: $priceText;
  text-align: left;
  font-size: $xxl;
  margin-top: 0;
  /* declared in src/styles/_variables.scss */
}
</style>
