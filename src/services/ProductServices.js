import WooCommerceRestApi from '@woocommerce/woocommerce-rest-api'

const apiClient = new WooCommerceRestApi({
  url: 'http://botanisthouse.local/',
  consumerKey: process.env.VUE_APP_CONSUMER_KEY,
  consumerSecret: process.env.VUE_APP_CONSUMER_SECRET,
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
