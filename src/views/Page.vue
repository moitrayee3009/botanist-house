<template>
  <div class="page">
    <h1>This is a regular page!!</h1>
    <div class="content" v-html="content"></div>
  </div>
</template>
<script>
// This component is right now running for all routes except the frontpage
import { getPageContent } from '@/utils/getPageContent.js'

export default {
  name: 'Page',
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
