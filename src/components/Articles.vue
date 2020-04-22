<template>
  <div>
    <h1 class="entry-title">ARTICLES</h1>
    <div class="post" v-for="post in posts">
      <img :src="post.fimg_url" />
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  mounted() {
    this.getPosts()
  },

  data() {
    return {
      postsUrl: 'http://botanisthouse.local/wp-json/wp/v2/posts',
      posts: [],
      postsData: {
        per_page: 10
      }
    }
  },
  methods: {
    getPosts() {
      axios
        .get(this.postsUrl, { params: this.postsData })
        .then((response) => {
          this.posts = response.data
          console.log('posts: ', response.data)
        })
        .catch((error) => {
          console.log('there is an error:' + error.response)
        })
    }
  }
}
</script>

<style lang="scss" scoped>
.post {
  margin-bottom: 1rem;
}
</style>
