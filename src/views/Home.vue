<template>
  <div class="home">
    <div class="home-content" v-html="content"></div>
    <div class="selection">SELECTION HERE</div>
  </div>
</template>

<script>
// @ is an alias to /src
import { getPageContent } from '@/utils/getPageContent.js'
export default {
  name: 'Home',
  data () {
    return {
      content: '...'
    }
  },
  mounted () {
    this.content = getPageContent()
  },
  components: {}
}
</script>
<style lang="scss">
.home-content {
  background-color: transparent;
}
</style>
