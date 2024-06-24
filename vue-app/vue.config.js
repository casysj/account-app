const { defineConfig } = require('@vue/cli-service')
module.exports = {
  devServer: {
    proxy: {
      '^/api': {
        target: 'http://localhost:8000', // Symfony 서버 주소
        changeOrigin: true
      }
    }
  }
}