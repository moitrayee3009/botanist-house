<template>
  <div class="home">
    <div class="home-content" v-html="content"></div>
    <div class="selection">
      <SelectionGrid class="selection-feed" />
      <div class="frontPage-link">
        <router-link to="/selection">
          SEE MORE
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import { getPageContent } from '@/utils/getPageContent.js'
import SelectionGrid from '@/components/SelectionGrid.vue'

export default {
  name: 'Home',
  components: {
    SelectionGrid
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

<style lang="scss" scoped>
@import '@/assets/styles/_variables.scss';

.home {
  background-color: transparent;
  margin: 0 !important;
}
.home-content {
  margin: 0 2rem 4rem;
}
.selection {
  display: flex;
  flex-direction: column;
  width: inherit;
  height: 50%;
  background-color: $pageBackground;
  padding-bottom: 2rem;

  .selection-feed {
    padding-top: 2rem;
  }
}
</style>
