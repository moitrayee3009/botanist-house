<template>
  <div class="page">
    <h1 class="entry-title">ARTICLES</h1>
    <Articles />
  </div>
</template>

<script>
import Articles from '@/components/Articles.vue'

export default {
  name: 'PostPage',
  components: {
    Articles
  },
  data () {
    return {
      posts: []
    }
  }
}
</script>
