import { defineConfig } from "vite";
import liveReload from "vite-plugin-live-reload";
import path from "path";

export default defineConfig({
	root: "src",
	base: "",
	// base: process.env.APP_ENV === "development" ? "/" : "/dist",
	build: {
		outDir: "../dist",
		manifest: true,
		emptyOutDir: true,
		rollupOptions: {
			input: path.resolve(__dirname, "src/main.js"),
			output: {
				assetFileNames: (assetInfo) => {
					let extType = assetInfo.name.split(".").at(1);
					if (/png|jpe?g|svg|gif|ico/i.test(extType)) {
						extType = "img";
					} else if (/woff|woff2/.test(extType)) {
						extType = "fonts";
					}
					return `assets/${extType}/[name]-[hash][extname]`;
				},
				chunkFileNames: "assets/js/[name]-[hash].js",
				entryFileNames: "assets/js/[name]-[hash].js",
			},
		},
	},
	// css: {
	// 	preprocessorOptions: {
	// 		scss: {
	// 			additionalData: `@use "~/generic/_index.scss" as *;`,
	// 		},
	// 	},
	// },
	plugins: [
		liveReload([__dirname + "/**/*.html"], {
			alwaysReload: true,
		}),
	],
	server: {
		fs: { strict: false },
		host: "0.0.0.0",
		origin: "http://localhost:3000",
		port: 3000,
		strictPort: true,
	},
});
