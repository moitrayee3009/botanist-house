<template>
  <div class="page">
    <h1 class="entry-title">ARTICLES</h1>
    <div class="content" v-html="content">
      <Articles v-for="post in posts" :key="post.id" :post="post" />
    </div>
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
  data () {
    return {
      content: '...',
      posts: [{}]
    }
  },
  mounted () {
    this.content = getPageContent()
  }
}
</script>
