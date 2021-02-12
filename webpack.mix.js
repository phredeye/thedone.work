const mix = require('laravel-mix')
const path = require('path')
const { VuetifyLoaderPlugin } = require('vuetify-loader')

mix.alias({
    '@': path.join(__dirname, 'resources/js')
})

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.s(c|a)ss$/,
                use: [
                    'vue-style-loader',
                    'css-loader',
                    {
                        loader: 'sass-loader',
                        // Requires sass-loader@^9.0.0
                        options: {
                            implementation: require('sass'),
                            // This is the path to your variables
                            additionalData: "@import '@/shared/styles/variables.scss'"
                        },
                    },
                ],
            },
        ],
    },
    plugins: [
        new VuetifyLoaderPlugin()
    ]
})

Mix.listen('configReady', webpackConfig => {
    // Exclude vuetify folder from default sass/scss rules
    const sassConfig = webpackConfig.module.rules.find(
        rule =>
            String(rule.test) ===
            String(/\.sass$/)
    );

    const scssConfig = webpackConfig.module.rules.find(
        rule =>
            String(rule.test) ===
            String(/\.scss$/)
    );

    sassConfig.exclude.push(path.resolve(__dirname, 'node_modules/vuetify'))
    scssConfig.exclude.push(path.resolve(__dirname, 'node_modules/vuetify'))
});

mix.js('resources/js/app/main.js', 'public/assets/app')
    .vue({
        version: 2,
        extractStyles: "public/assets/app/main.css",
        globalStyles: "public/assets/app/global.css"
    })
    .sourceMaps()

mix.js('resources/js/admin/main.js', 'public/assets/admin')
    .vue({
        version: 2,
        extractStyles: "public/assets/admin/main.css",
        globalStyles: "public/assets/admin/global.css"
    })
    .sourceMaps()
