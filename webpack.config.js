const path = require('path');
let ImageminPlugin = require( 'imagemin-webpack-plugin' ).default;
const {GenerateSW} = require('workbox-webpack-plugin');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            'images': path.resolve('resources/images'),
        },
    },
    plugins: [
        new ImageminPlugin( {
            pngquant: {
                quality: '95-100',
            },
            test: /\.(jpe?g|png|gif|svg)$/i,
        } ),
        new GenerateSW({
            modifyURLPrefix: {
                '/': '/'
            },
        }),
    ],
};
