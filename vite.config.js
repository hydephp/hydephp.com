// Using Vite is optional, as the styles you need to get started are already included.
// However, if you customize existing or add new Tailwind classes, you can use Vite
// to compile the assets. See https://hydephp.com/docs/1.x/managing-assets.html.

import fs from 'node:fs';
import path from 'node:path';
import { defineConfig } from 'vite';
import tailwindcss from "@tailwindcss/vite";
import hyde from 'hyde-vite-plugin';

const docsStylesheetPlugin = {
    name: 'hyde-docs-stylesheet',
    buildStart() {
        for (const file of ['_media/docs.css', '_media/app2.css']) {
            const pathName = path.resolve(file);

            if (fs.existsSync(pathName)) fs.rmSync(pathName);
        }
    },
    closeBundle() {
        const source = path.resolve('_media/app2.css');
        const target = path.resolve('_media/docs.css');

        if (fs.existsSync(source)) fs.renameSync(source, target);
    },
};

export default defineConfig({
    plugins: [
        hyde({
            input: ['resources/assets/app.css', 'resources/assets/app.js', 'resources/assets/docs.css'],
            watch: ['_pages', '_posts', '_docs'],
            refresh: true,
        }),
        tailwindcss(),
        docsStylesheetPlugin,
    ],
});
