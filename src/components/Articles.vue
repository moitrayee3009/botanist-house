<template>
  <div>
    <h1 class="entry-title">ARTICLES</h1>
    <div v-if="posts.length > 0">
      <div
        class="post"
        v-for="post in posts"
        :key="post.id"
        :style="{ backgroundImage: `url(${post.jetpack_featured_media_url})` }"
      >
        <!--  :style="{ backgroundImage: `url(${post.fimg_url})` }"-->

        <div class="details">
          <p class="author-name">
            <span>{{ post.author_meta.first_name }}</span>
            <span>{{ post.author_meta.last_name }}</span>
          </p>
          <p class="post-title">{{ post.title.rendered }}</p>
          <a :href="post.slug" class="link" target="_blank">
            <!-- <img :src="post.fimg_url" /> -->
            Read article
          </a>
        </div>
      </div>
    </div>
    <div class="spin" v-else>
      <Spinner line-fg-color="#8e140a"></Spinner>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Spinner from 'vue-simple-spinner'
import config from './../config.js'

export default {
  components: {
    Spinner
  },
  mounted () {
    this.getPosts()
  },

  data () {
    return {
      postsUrl: config.staging.URL + 'wp-json/wp/v2/posts',
      posts: [],
      postsData: {
        per_page: 10
      }
    }
  },
  methods: {
    getPosts () {
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
@import '@/assets/styles/_variables.scss';

.post {
  display: flex;
  background-position: bottom;
  background-size: cover;
  height: 430px;
  background-repeat: no-repeat;
  width: 90%;

  /* border: 1rem solid white; */
  margin: 2rem auto;
  /* @media (max-width: $desktop) {
    width: 93%;
  } */

  .details {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 3rem;
    font-family: 'NeueHaasUnicaW1G-Regular';
    .author-name {
      justify-content: flex-start;
      text-align: left;
      text-transform: uppercase;
      letter-spacing: 1.5pt;
      font-weight: $bold;
      color: $pageBackground;
      line-height: 1.2;
      font-size: 0.8rem !important;
      span {
        padding-right: 1rem;
      }
      @media (max-width: $mobileL) {
        font-size: 0.8rem !important;
        letter-spacing: 1pt !important;
        span {
          padding-right: 0.5rem;
        }
      }
    }
    .post-title {
      width: 60%;
      justify-content: flex-start;
      text-align: left;
      text-transform: uppercase;
      letter-spacing: 2pt;
      font-weight: $bold;
      color: $coverText;
      line-height: 1.2;
      font-size: 1.7rem !important;
      margin-bottom: 1.2rem;
      @media (max-width: $mobileL) {
        width: 80%;
        font-size: 1.5rem !important;
        letter-spacing: 2pt !important;
      }
    }
  }
  .link {
    display: flex;
    justify-content: center;
    width: fit-content;
    padding: 0.3rem 3rem;
    text-align: center;
    background-color: $frontPageButton;
    color: $pageBackground;
    font-weight: $semiBold;
    font-size: 0.7rem;
    text-transform: uppercase;
  }
}
</style>
