<template>
  <div>
    <div v-for="product in products" :key="product.id" :product="product">
      {{ products }}
    </div>
  </div>
</template>

<script>
import ProductServices from '@/services/ProductServices.js'
export default {
  data () {
    return {
      products: []
    }
  },
  created () {
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

<style lang="scss" scoped></style>
