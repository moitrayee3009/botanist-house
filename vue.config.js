// vue.config.js
module.exports = {
  filenameHashing: false,
  css: {
    loaderOptions: {
      sass: {
        sassOptions: {
          data: `
          @import "@/assets/styles/_variables.scss";
        `
        }
      }
    }
  }
}
