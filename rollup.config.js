import resolve from "@rollup/plugin-node-resolve";

export default {
	input: "src/main.js",
	output: {
		file: "dist/js/uca.js",
		format: "es",
	},
};
