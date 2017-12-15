const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = [{
    context: path.join(__dirname, 'scss'),
    entry: {
        style: './style.scss'
    },
    output: {
        path: __dirname,
        filename: '[name].css'
    },
    module: {
        loaders: [{
            test: /\.scss$/,
            loader: ExtractTextPlugin.extract({
                use: [{
                    loader: "css-loader",
                    options: {
                        url: false,
                        minimize: true,
                        sourceMap: true
                    }
                }, {
                    loader: 'sass-loader',
                    options: {
                        sourceMap: true
                    }
                }]
            })
        }]
    },
    devtool: 'source-map',
    plugins: [
        new ExtractTextPlugin('[name].css')
    ]
}];