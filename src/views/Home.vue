<template>
  <div class="home">
    <div class="home-content" v-html="content"></div>
    <div class="selection">
      SELECTION HERE
      <Selection
        v-for="product in products"
        :key="product.id"
        :product="products"
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
        this.products = response.data
        console.log(response.data)
      })
      .catch((error) => {
        console.log('there is an error:' + error.response)
      })
  }
}
</script>
<style lang="scss">
.home-content {
  background-color: transparent;
}
</style>
