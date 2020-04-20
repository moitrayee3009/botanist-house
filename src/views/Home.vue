<template>
  <div class="home">
    <div class="home-content" v-html="content"></div>
    <h1 class="entry-title">SELECTION</h1>
    <div class="selection">
      <Selection
        v-for="product in products"
        :key="product.id"
        :product="product"
      />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import { getPageContent } from '@/utils/getPageContent.js'
import Selection from '@/components/Selection.vue'
import ProductServices from '@/services/ProductServices.js'

export default {
  name: 'Home',
  components: {
    Selection
  },
  data () {
    return {
      content: '...',
      products: [{}]
    }
  },
  mounted () {
    this.content = getPageContent()

    ProductServices.getProducts()
      .then((response) => {
        // Successful request
        this.products = response.data
        // console.log('Response Status:', response.status)
        // console.log('Response Headers:', response.headers)
        console.log('Response Data:', response.data)
        // console.log('Total of pages:', response.headers['x-wp-totalpages'])
        // console.log('Total of items:', response.headers['x-wp-total'])
      })
      .catch((error) => {
        // Invalid request, for 4xx and 5xx statuses
        console.log('Response error:', error.response)
        // console.log('Response Headers:', error.response.headers)
        // console.log('Response Data:', error.response.data)
      })
      .finally(() => {
        // Always executed.
      })
  }
}
</script>
<style lang="scss">
@import '@/assets/styles/_variables.scss';
.home-content {
  background-color: transparent;
}
.selection {
  background-color: $pageBackground;
  display: flex;
  flex: 1;
  justify-content: space-evenly;
  padding: 2rem 0;
  box-sizing: border-box;
}
</style>
