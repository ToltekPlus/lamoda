const { defineConfig } = require("@vue/cli-service");
module.exports = defineConfig({
  transpileDependencies: true,
  configureWebpack: {
    devServer: {
      hot: true,
    },
    mode: "development",
    watchOptions: {
      ignored: /node_modules/,
      poll: 1000,
    },
  },
});
