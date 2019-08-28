const webpack = require('webpack')
const path = require('path')
const autoprefixer = require('autoprefixer')
const cli = require('commander')
const fs = require('fs')
const lessToJs = require('less-vars-to-js');
// variables
const isProduction = process.argv.indexOf('-p') >= 0 || process.env.NODE_ENV === 'production'

cli
    .option('-s, --site [type]', 'Which site to run?', 'softverk')
    .allowUnknownOption()
    .parse(process.argv)

let siteConfig = {}
if (!isProduction) {
    const sitename = cli.site
    console.log('[Starting with sitename]', sitename)
    siteConfig = require(path.join(__dirname, '/site_configs/' + sitename + '.json'))
}

const sourcePath = path.join(__dirname, '/media/com_webportal/ts')
const outPath = isProduction ? path.join(__dirname, '/media/com_webportal/dist') : undefined; // in develop, serve from mermoy

console.log('is production ?? : ', isProduction)

// plugins
const HtmlWebpackPlugin = require('html-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const WebpackCleanupPlugin = require('webpack-cleanup-plugin')

function findFilesFromDirectory(startPath, filter, result) {

    console.log('Starting from dir ' + startPath + '/')

    if (!fs.existsSync(startPath)) {
        console.log("no dir ", startPath)
        return
    }

    const files = fs.readdirSync(startPath)
    for (let i = 0; i < files.length; i++) {
        const filename = path.join(startPath, files[i])
        const stat = fs.lstatSync(filename)
        if (stat.isDirectory()) {
            findFilesFromDirectory(filename, filter, result); //recurse
        }
        else if (filename.indexOf(filter) >= 0) {
            console.log('-- found: ', filename)
            result.push(filename)
        }

    }

}


const entryFiles = {}
const entryBaseFile = path.join(__dirname, '/media/com_webportal/ts/containers/')

const tsxFiles = []
findFilesFromDirectory(entryBaseFile, '.tsx', tsxFiles)
console.log('Found tsx files : ', tsxFiles)
for (const file of tsxFiles) {
    const value = file.replace(entryBaseFile, "")
    const key = value.replace(".tsx", "")
    entryFiles[key] = "./containers/" + value
}

console.log('Webpack UI txs files are : ', entryFiles)

const AntDesignThemePlugin = require('antd-theme-webpack-plugin');

const paletteLess = fs.readFileSync('./media/com_webportal/ts/styles/variables.less', 'utf8');
const variables = lessToJs(paletteLess);

// for(const v in variables){
//     console.log(`<option value="${v}">${v}</option>`)
// }
//
// exit(1);
console.log('variables less :  ',variables)
const options = {
    antDir: path.join(__dirname, './node_modules/antd'),
    stylesDir: path.join(__dirname, './media/com_webportal/ts/styles/'),
    varFile: path.join(__dirname, './media/com_webportal/ts/styles/variables.less'),
    mainLessFile: path.join(__dirname, './media/com_webportal/ts/styles/index.less'),
    themeVariables:  Object.keys(variables),
    indexFileName:  false,
    generateOnce: false
}
console.log('Less config is : -> ',options)

const themePlugin = new AntDesignThemePlugin(options);


module.exports = {
    context: sourcePath,
    entry: {
        app: './index.tsx', // default
        ...entryFiles,
    },
    output: {
        path: outPath,
        pathinfo: false,
        filename: '[name].js',
        chunkFilename: '[chunkhash].[name].js'
    },
    target: 'web',
    resolve: {
        extensions: ['.js', '.ts', '.tsx'],
        // Fix webpack's default behavior to not load packages with jsnext:main module
        // (jsnext:main directs not usually distributable es6 format, but es6 sources)
        mainFields: ['module', 'browser', 'main'],
        alias: {
            app: path.resolve(__dirname, 'media/com_webportal/ts') //TODO: hack this to make multiple entry
        }
    },
    module: {
        rules: [
            // .ts, .tsx
            {
                test: /\.tsx?$/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {plugins: ['react-hot-loader/babel', ['import', {libraryName: 'antd', style: true}]]} // TODO: remove 'react-hot-loader/babel' if its production
                    },
                    'ts-loader'
                ]
            },
            {
                test: /\.less$/, // for everything except antd
                exclude: [
                    path.resolve(__dirname, "node_modules/antd")
                ],
                use: [
                    require.resolve('style-loader'),
                    {
                        loader: 'css-loader',
                        options: {
                            modules: true,
                            sourceMap: true,
                            localIdentName: "[local]___[hash:base64:5]"
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            ident: 'postcss',
                            plugins: () => [
                                require('postcss-flexbugs-fixes'),
                                // require('postcss-inline-rtl'),
                                autoprefixer({
                                    browsers: [
                                        '>1%',
                                        'last 4 versions',
                                        'Firefox ESR',
                                        'not ie < 9' // React doesn't support IE8 anyway
                                    ],
                                    flexbox: 'no-2009'
                                })
                            ]
                        }
                    },
                    {
                        loader: 'less-loader',
                        options: {
                            modules: true,
                            javascriptEnabled: true
                        }
                    }
                ]
            },
            {
                test: /\.less$/, // ONLY for antd
                include: [
                    path.resolve(__dirname, "node_modules/antd")
                ],
                use: [
                    require.resolve('style-loader'),
                    {
                        loader: 'css-loader',
                        options: {
                            modules: false,
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            ident: 'postcss',
                            plugins: () => [
                                require('postcss-flexbugs-fixes'),
                                // require('postcss-inline-rtl'),
                                autoprefixer({
                                    browsers: [
                                        '>1%',
                                        'last 4 versions',
                                        'Firefox ESR',
                                        'not ie < 9' // React doesn't support IE8 anyway
                                    ],
                                    flexbox: 'no-2009'
                                })
                            ]
                        }
                    },
                    {
                        loader: 'less-loader',
                        options: {
                            javascriptEnabled: true,
                            modifyVars: variables
                        }
                    }
                ]
            },
            // static assets
            {test: /\.html$/, use: 'html-loader'},
            {test: /\.(a?png|svg)$/, use: 'url-loader?limit=10000'},
            {test: /\.(jpe?g|gif|bmp|mp3|mp4|ogg|wav|eot|ttf|woff|woff2)$/, use: 'file-loader'}
        ]
    },
    optimization: isProduction ? { // use optimization only in production
        splitChunks: {
            name: true,
            cacheGroups: {
                commons: {
                    chunks: 'initial',
                    minChunks: 2
                },
                vendors: {
                    test: /[\\/]node_modules[\\/]/,
                    chunks: 'all',
                    priority: -10
                }
            }
        },
        runtimeChunk: true
    } : {
        removeAvailableModules: false,
        removeEmptyChunks: false,
        splitChunks: false,
    },
    plugins: [
        new webpack.EnvironmentPlugin({
            NODE_ENV: 'development', // use 'development' unless process.env.NODE_ENV is defined
            DEBUG: false
        }),
        new WebpackCleanupPlugin(),
        new MiniCssExtractPlugin({
            filename: '[contenthash].css',
            disable: !isProduction
        }),
        new HtmlWebpackPlugin({
            template: '../../../components/com_webportal/index.html'
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            less: 'less'
        }),
        themePlugin,
    ],
    devServer: {
        contentBase: sourcePath,
        hot: true,
        disableHostCheck: true,
        inline: true,
        historyApiFallback: {
            disableDotRule: true
        },
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE, PATCH, OPTIONS",
            "Access-Control-Allow-Headers": "X-Requested-With, content-type, Authorization"
        },
        stats: 'minimal',
        clientLogLevel: 'warning'
    },
    // https://webpack.js.org/configuration/devtool/
    devtool: isProduction ? 'hidden-source-map' : 'cheap-source-map',
    node: {
        // workaround for webpack-dev-server issue
        // https://github.com/webpack/webpack-dev-server/issues/60#issuecomment-103411179
        fs: 'empty',
        net: 'empty'
    }
}
