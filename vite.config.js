import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

// export default defineConfig({
//     plugins: [laravel(['resources/css/app.css', 'resources/js/app.js'])],
//     server: {
//         host: '0.0.0.0', // Permite que o Vite seja acessível de fora do container
//         watch: {
//             usePolling: true, // Necessário para rodar no Docker
//         },
//         hmr: {
//             host: 'localhost', // Ajuste para o host correto se necessário
//         },
//     },
// });
