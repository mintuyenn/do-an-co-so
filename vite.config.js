import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react"; // ✅ Import React plugin
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/home.css",
                "resources/css/login.css",
                "resources/css/register.css",
                "resources/js/giohang.js",
                "resources/js/home.js",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
        react(), // ✅ Kích hoạt plugin React
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources"),
        },
    },
});
