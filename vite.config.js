import { fileURLToPath, URL } from 'url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  devServer: {
        proxy: {
            '/V1': {
                target: 'http://localhost:8888',
                changeOrigin: true,
                pathRewrite: {
                    '^/V1': ''
                }
            },
            '/V2': {
                target: 'https://loclhost:4437',
                changeOrigin: true,
                pathRewrite: {
                    '^/V2': ''
                }
            },
            
        }
    },
  plugins: [vue()],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  }
  
})
