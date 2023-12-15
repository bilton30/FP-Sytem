import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// import vue from '@vitejs/plugin-vue'
import { quasar, transformAssetUrls } from '@quasar/vite-plugin'
// import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({input:[
            'resources/css/app.css',
            'resources/sass/app.scss',
            // 'resources/sass/default.scss',
            'resources/js/app.js',
        ],
         refresh: true,
}),
        
        // react(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        quasar({
            sassVariables: 'resources/js/plugins/quasar-variables.sass'
          })
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            
        }
    }
});