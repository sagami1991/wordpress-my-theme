// @ts-check

const path = require("path");
const fs = require("fs");
const webpack = require("webpack");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");

module.exports = [{
	context: path.join(__dirname, "scss"),
	entry: {
		style: "./main.scss"
	},
	output: {
		path: path.join(__dirname, "theme-dir"),
		filename: "tmp.css"
	},
	module: {
		loaders: [{
			test: /\.scss$/,
			loader: ExtractTextPlugin.extract({
				use: [{
					loader: "css-loader",
					options: {
						minimize: true,
						sourceMap: true
					}
				}, {
					loader: "sass-loader",
					options: {
						sourceMap: true
					}
				}]
			})
		}, {
			test: /\.png$/,
			use: [{
				loader: "url-loader",
				options: {
					limit: 10000,
					mimetype: "image/png"
				}
			}]
		}, {
			test: /\.svg$/,
			use: [{
				loader: "svg-url-loader",
				options: {
					limit: 10000,
				}
			}]
		}, ]
	},
	devtool: "source-map",
	plugins: [
		new ExtractTextPlugin({
			filename: "style.css"
		}),
		new webpack.BannerPlugin({
			banner: fs.readFileSync(path.join(__dirname, "theme-header-comment.txt"), {
				encoding: "utf8"
			}),
			entryOnly: true,
			include: "style.css"
		}),
		new CopyWebpackPlugin([{
			from: path.join(__dirname, "theme-dir"),
			to: "/xampp/htdocs/wordpress/wp-content/themes/my-theme",
			ignore: ["tmp.css", "tmp.css.map"]
		}])
	]
}];