<template>
  <div class="container">
    <!-- <router-link
      class="product-link"
      :to="{ name: 'single-product', params: { id: product.id } }"
    > -->
    <div class="product">
      <div class="image" v-if="product.images">
        <img :src="product.images[0].src" />
      </div>
      <h4 class="name">{{ product.name }}</h4>
      <p class="price">€{{ product.price }}.00</p>
    </div>
    <!-- </router-link> -->
  </div>
</template>

<script>
export default {
  props: {
    product: {}
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
    flex-flow: column wrap;
    text-align: left;
    width: fit-content;
    height: auto;
    padding: 1rem;
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
