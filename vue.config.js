// vue.config.js
module.exports = {
  filenameHashing: false,
  css: {
    extract: true,
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
