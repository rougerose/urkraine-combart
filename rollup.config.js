import resolve from "@rollup/plugin-node-resolve";
import terser from "@rollup/plugin-terser";
import commonjs from "@rollup/plugin-commonjs";

const output_plugins = [
	process.env.NODE_ENV === "production" && terser(),
	// filesize(),
];

export default [
	{
		input: "focus-visible/src/focus-visible.js",
		plugins: [resolve(), commonjs()],
		output: [
			{
				file: "dist/js/polyfill/focus-visible.js",
				format: "umd",
				plugins: output_plugins,
			},
		],
	},
];
