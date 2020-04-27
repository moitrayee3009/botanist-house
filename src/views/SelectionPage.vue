<template>
  <div class="page">
    <h1 class="entry-title">SELECTION</h1>
    <div class="content" v-if="products.length > 0">
      <Selection
        v-for="product in products"
        :key="product.id"
        :product="product"
      />
    </div>
  </div>
</template>

<script>
import Selection from '@/components/Selection.vue'
import ProductServices from '@/services/ProductServices.js'

export default {
  name: 'SelectionPage',
  components: {
    Selection
  },
  data() {
    return {
      products: [{}]
    }
  },
  mounted() {
    ProductServices.getProducts()
      .then((response) => {
        // Successful request
        this.products = response.data
        console.log('Response Data:', response.data)
      })
      .catch((error) => {
        // Invalid request, for 4xx and 5xx statuses
        console.log('Response error:', error.response)
      })
      .finally(() => {
        // Always executed.
      })
  }
}
</script>

<style lang="scss" scoped>
@import '@/assets/styles/_variables.scss';

.content {
  display: flex;
  justify-content: space-around;
  padding-top: 1rem;
  height: fit-content;
  margin-left: auto;
  margin-right: auto;
  @media (max-width: $mobileL) {
    flex-flow: column wrap;
  }
}
</style>
