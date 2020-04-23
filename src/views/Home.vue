<template>
  <div class="home">
    <div class="home-content" v-html="content"></div>
    <div class="selection">
      <!-- <h1 class="homePage-entry-title">SELECTION</h1>
      <div class="selection-product">
        <Selection
          v-for="product in products"
          :key="product.id"
          :product="product"
        />
      </div> -->
      <SelectionPage
        class="selection-feed"
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
// import Selection from '@/components/Selection.vue'
// import ProductServices from '@/services/ProductServices.js'
import SelectionPage from '@/views/SelectionPage.vue'

export default {
  name: 'Home',
  components: {
    SelectionPage
  },
  data () {
    return {
      content: '...',
      products: [{}]
    }
  },
  mounted () {
    this.content = getPageContent()
  }
}
</script>

<style lang="scss" scoped>
@import '@/assets/styles/_variables.scss';

.home {
  background-color: transparent;
  margin: 0 !important;
}
.home-content {
  margin: 0 2rem;
}
.selection {
  display: flex;
  flex-direction: column;
  width: inherit;
  background-color: $pageBackground;
  margin-top: 2rem;
  /* padding-top: 2rem;
  @media (max-width: $laptopL) {
    padding-top: 2.5rem;
  }
  @media (max-width: $mobileL) {
    padding-top: 0;
  } */

  .selection-feed {
    padding-top: 2rem;
  }
}
</style>
