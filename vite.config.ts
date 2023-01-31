import { ConfigEnv, defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

// https://vitejs.dev/config/
export default defineConfig(({ command }: ConfigEnv) => {
    return {
        base: command === "build" ? "/dist/" : "",
        publicDir: "disable",
        build: {
            manifest: true,
            outDir: "public/build",
            rollupOptions: {
                input: {
                    app: "resources/js/app.ts",
                },
            },
        },
        plugins: [
            vue(),
            laravel({
                input: ["resources/css/app.css", "resources/js/app.ts"],
                refresh: true,
            }),
        ],
        optimizeDeps: {
            include: ["@inertiajs/vue3", "axios", "vue"],
        },
    };
});
