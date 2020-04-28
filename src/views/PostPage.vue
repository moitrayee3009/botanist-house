<template>
  <div class="page">
    <h1 class="entry-title">ARTICLES</h1>
    <div class="content" v-html="content"></div>
    <Articles />
  </div>
</template>

<script>
import { getPageContent } from '@/utils/getPageContent.js'
import Articles from '@/components/Articles.vue'

export default {
  name: 'PostPage',
  components: {
    Articles
  },
  data() {
    return {
      content: '...'
    }
  },
  mounted() {
    this.content = getPageContent()
  }
}
</script>
