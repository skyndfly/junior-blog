import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import reactRefresh from '@vitejs/plugin-react-refresh';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        hmr:{
            //host: 'junior-blog.loc'
            host: 'junior-blog.ru'
            // host: '0.0.0.0'
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/admin/app.js',
                'resources/js/admin/title-length.js',
                'resources/js/admin/shortDescription-length.js',
                'resources/js/admin/slug-transform.js',
                'resources/js/react/addCommentsAuth/app.tsx'
            ],
            refresh: true,
        }),
        reactRefresh()
    ],
});
