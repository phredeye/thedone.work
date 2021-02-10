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
                            options: {
                                // This is the path to your variables
                                additionalData: "@import '@/styles/variables.scss'"
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

mix.js('js/app.js', 'app')
    .vue(vueConfig)
    .sourceMaps()

