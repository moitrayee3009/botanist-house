import WooCommerceRestApi from '@woocommerce/woocommerce-rest-api'

const apiClient = new WooCommerceRestApi({
  url: 'http://botanisthouse.local/',
  consumerKey: 'ck_5176270cbe10a2da009b18bdbe09ee1760889c1c',
  consumerSecret: 'cs_61d658e3bc8db92d4820c0997ca24ee68a1d6c6f',
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
