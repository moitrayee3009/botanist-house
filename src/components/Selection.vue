<template>
  <div class="container">
    <a :href="product.slug">
      <div class="product">
        <div class="image" v-if="product.images">
          <img :src="product.images[0].src" />
        </div>
        <!-- <h4 class="name">{{ product.name }}</h4>
        <p class="price">€{{ product.price }}.00</p> -->
      </div>
    </a>
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
  min-width: 33.33% !important;
  display: flex;
  justify-content: center;
  flex: 1;
  box-sizing: border-box;
  .product {
    flex-flow: column wrap;
    width: fit-content;
    height: auto;
    padding: 2rem;
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
      color: $pageHeaderText;
      text-align: left;
      font-size: $xxl;
      margin-top: 0;
    }
  }
}
</style>
