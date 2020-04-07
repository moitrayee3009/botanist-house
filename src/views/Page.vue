<template>
  <div class="page">
    <h1>This is a regular page!!</h1>
    <div class="content" v-html="content"></div>
  </div>
</template>
<script>
// This component is right now running for all routes now except front page
// Test this by adding a new page with some content (for example an About)
// This component will show.
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
