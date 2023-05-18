const { defineConfig } = require("@vue/cli-service");
module.exports = defineConfig({
  transpileDependencies: true,
  configureWebpack: {
    devServer: {
      hot: true,
      proxy: {
        "/api": {
          headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Methods": "GET,HEAD,OPTIONS,POST,PUT",
            "Access-Control-Allow-Headers":
              "Origin, X-Requested-With, Content-Type, Accept, Authorization",
          },
          target: "http://localhost:8080",
          pathRewrite: { "^/api": "" },
          secure: false,
          changeOrigin: true,
        },
      },
    },
    mode: "development",
    watchOptions: {
      ignored: /node_modules/,
      poll: 1000,
    },
  },
});
