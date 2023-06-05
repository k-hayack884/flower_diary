import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: true,
        hmr: {
            host: 'https://flower-diary.herokuapp.com/',
        },
        watch: {
            usePolling: false,
        },
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,

        }),

        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),

    ],
});
