<template>
  <div class="home">
    <div class="home-content" v-html="content"></div>
    <div class="selection">
      SELECTION HERE
      <Selection />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import { getPageContent } from '@/utils/getPageContent.js'
import Selection from '@/components/Selection.vue'
export default {
  props: {
    product: Object
  },
  name: 'Home',
  components: {
    Selection
  },
  data () {
    return {
      content: '...'
    }
  },
  mounted () {
    this.content = getPageContent()
  }
}
</script>
<style lang="scss">
.home-content {
  background-color: transparent;
}
</style>
