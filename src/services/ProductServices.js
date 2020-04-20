import axios from 'axios'

const apiClient = axios.create({
  baseURL: 'http://botanisthouse.local/',
  withCredentials: false,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
})

export default {
  getProducts () {
    return apiClient.get(
      '/wp-json/wc/v3/products?consumer_key=[]&consumer_secret=[]'
    )
  },
  getProduct () {
    return apiClient.get()
  }
}
