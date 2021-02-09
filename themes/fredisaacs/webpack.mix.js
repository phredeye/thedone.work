const mix = require('laravel-mix')
const path = require('path')
mix.setPublicPath('../../public')


mix.webpackConfig({
    module : {
        rules: [
            {
                test: /\.s(c|a)ss$/,
                use: [
                    'vue-style-loader',
                    'css-loader',
                    {
                        loader: 'sass-loader',
                        // Requires sass-loader@^8.0.0
                        options: {
                            implementation: require('sass'),
                            sassOptions: {
                                indentedSyntax: true // optional
                            },
                        },
                    },
                ]
            }
        ]
    }
})

mix.alias({
    '@': path.join(__dirname, 'js')
})

const vueConfig = {
    version: 2,
    extractStyles: true,
    globalStyles: 'css/global.css'
}

mix.js('js/guest/app.js', 'apps/guest').vue(vueConfig)
    .js('js/client/app.js', 'apps/client').vue(vueConfig)
    .sourceMaps()

