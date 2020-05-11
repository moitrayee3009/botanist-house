import WooCommerceRestApi from '@woocommerce/woocommerce-rest-api'
import config from './../config.js'

const state = 'staging' // this one can be a .env variable

const apiClient = new WooCommerceRestApi({
  url: config[state].URL,
  consumerKey: config[state].VUE_APP_CONSUMER_KEY,
  consumerSecret: config[state].VUE_APP_CONSUMER_SECRET,
  version: 'wc/v3'
})

export default {
  getProducts () {
    return apiClient.get('products', { per_page: 20 })
  },
  getProduct () {
    return apiClient.get()
  }
}
