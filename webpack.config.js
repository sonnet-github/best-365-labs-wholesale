const Webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const Path = require('path');
const TerserPlugin = require('terser-webpack-plugin');
const WebpackVersionFile = require('webpack-version-file');
const now = new Date();
const yy = now.getFullYear();
const mm = now.getMonth() + 1;
const dd = now.getDate();
const ver = `${yy}${mm < 10 ? '0' + mm : mm}${dd < 10 ? '0' + dd : dd}.${now.getTime()}`;

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'bundle.js',
        path: Path.resolve(__dirname, 'dist')
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.(css|scss)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            url: false,
                            sourceMap: true,
                        }
                    },
                    'postcss-loader',
                    'sass-loader'
                ]
            }
        ]
    },
    optimization: {
        minimize: true,
        minimizer: [new TerserPlugin({
            test: /\.js$/,
        })]
    },
    plugins: [
        new Webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery"
        }),
        new MiniCssExtractPlugin({
            filename: 'style.css'
        }),
        new WebpackVersionFile({
            output: './dist/version.php',
            templateString: '<?php define("_BUILD_VERSION", "<%= version %>");',
            data: {
                version: ver
            }
        })
    ]
};
