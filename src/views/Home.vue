<template>
  <div class="home">
    <div class="home-content" v-html="content"></div>
    <div class="selection">
      <h1 class="homePage-entry-title">SELECTION</h1>
      <div class="selection-product">
        <Selection
          v-for="product in products"
          :key="product.id"
          :product="product"
        />
      </div>
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
  data() {
    return {
      content: '...',
      products: [{}]
    }
  },
  mounted() {
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
  display: flex;
  flex-direction: column;
  width: inherit;
  background-color: $pageBackground;
  .homePage-entry-title {
    text-align: center;
    font-family: Freight;
    font-weight: $semiBold;
    color: $pageHeaderText;
    margin-top: -2.5%;
    @media (max-width: $tabletL) {
      margin-top: -4%;
    }
    /* @media (max-height: $laptopL) {
      margin-top: -5.5%;
    } */
    @media (max-width: $mobileL) {
      margin-top: -6.5%;
      font-size: 2rem;
    }
  }

  .selection-product {
    display: flex;
    flex: 1;
    justify-content: space-evenly;
    /* padding: 2rem 0; */
    box-sizing: border-box;
    @media (max-width: $mobileL) {
      flex-flow: column wrap;
    }
  }
}
</style>
