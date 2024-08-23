import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        hmr:{
            host: 'junior-blog.ru'
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/admin/app.js',
                'resources/js/admin/title-length.js',
                'resources/js/admin/shortDescription-length.js',
                'resources/js/admin/slug-transform.js'
            ],
            refresh: true,
        }),
    ],
});
