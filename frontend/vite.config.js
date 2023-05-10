import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    // {
    //   name: "singleHMR",
    //   handleHotUpdate({ modules }) {
    //     modules.map((m) => {
    //       m.importedModules = new Set();
    //       m.importers = new Set();
    //     });

    //     return modules;
    //   },
    // },
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  }
})
