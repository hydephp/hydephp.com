import { defineConfig } from 'vite';
import tailwindcss from "@tailwindcss/vite";
import hyde from 'hyde-vite-plugin';

export default defineConfig({
    plugins: [
        hyde({
            input: ['resources/assets/app.css', 'resources/assets/app.js'],
            watch: ['_pages', '_posts', '_docs'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
