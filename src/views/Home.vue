<template>
  <div class="home">
    <div class="home-content" v-html="content"></div>
    <div class="selection">
      <SelectionGrid class="selection-feed" />
      <div class="check-selection">
        <router-link to="/selection" target="_blank">
          Check Our Selection
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
  margin: 0 2rem 2rem 2rem;
}
.selection {
  display: flex;
  flex-direction: column;
  width: inherit;
  height: 50%;
  background-color: $pageBackground;
  margin-top: 6rem;
  padding-bottom: 2rem;

  .selection-feed {
    padding-top: 2rem;
  }
  .check-selection {
    border: 1px solid #eeeeee;
    width: fit-content;
    margin: 0 auto;
    a {
      display: flex;
      justify-content: center;
      width: fit-content;
      padding: 0.3rem 2rem;
      text-align: center;
      background-color: transparent;
      color: $pageHeaderText;
      font-weight: $semiBold;
      font-size: 1.5rem;
    }
    :focus {
      border: none;
    }
    :hover {
      background-color: #eeeeee;
    }
  }
}
</style>
