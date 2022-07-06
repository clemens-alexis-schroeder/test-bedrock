const pkg = require('./package.json');
var webpack = require('webpack');
var jQuery = require('jquery/dist/jquery.min');
const CompressionPlugin = require('compression-webpack-plugin');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer')
  .BundleAnalyzerPlugin;

module.exports = {
  // Project Identity
  appName: 'localMedia', // Unique name of your project
  type: 'theme', // Plugin or theme
  slug: 'localmedia', // Plugin or Theme slug, basically the directory name under `wp-content/<themes|plugins>`
  // Used to generate banners on top of compiled stuff
  bannerConfig: {
    name: 'Localmedia',
    author: 'localmedia.ch',
    license: '',
    link: 'https://localmedia.ch',
    version: pkg.version,
    copyrightText: '',
    credit: false,
  },

  // Files we need to compile, and where to put
  files: [
    // If this has length === 1, then single compiler
    {
      name: 'app',
      entry: {
        main: ['./src/index.js'],
      },
      // Extra webpack config to be passed directly
      webpackConfig: {
        module: {
          rules: [
            {
              test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
              use: [
                {
                  loader: 'file-loader',
                  options: {
                    name: '[name].[ext]',
                    outputPath: './fonts/',
                  },
                },
              ],
            },
          ],
        },
        plugins: [
          new webpack.ProvidePlugin({
            //provide jquery in all the ways 3rd party plugins might look for it (note that window.$/window.jQuery will not actually set it on the window, which is cool)
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            'window.$': 'jquery',
          }),
          new CompressionPlugin({
            algorithm: 'gzip',
          }),
          // new BundleAnalyzerPlugin(),
        ],
      },
    },
  ],
  // Output path relative to the context directory
  // We need relative path here, else, we can not map to publicPath
  outputPath: 'dist',
  // Project specific config
  // Needs react(jsx)?
  hasReact: true,
  // Disable react refresh
  disableReactRefresh: false,
  // Needs sass?
  hasSass: true,
  // Needs less?
  hasLess: false,
  // Needs flowtype?
  hasFlow: false,
  // Externals
  // <https://webpack.js.org/configuration/externals/>
  externals: {
    // jquery: 'jQuery',
  },
  // Webpack Aliases
  // <https://webpack.js.org/configuration/resolve/#resolve-alias>
  alias: undefined,
  // Show overlay on development
  errorOverlay: true,
  // Auto optimization by webpack
  // Split all common chunks with default config
  // <https://webpack.js.org/plugins/split-chunks-plugin/#optimization-splitchunks>
  // Won't hurt because we use PHP to automate loading
  optimizeSplitChunks: true,
  // Usually PHP and other files to watch and reload when changed
  watch: './**/*.php',
  // Files that you want to copy to your ultimate theme/plugin package
  // Supports glob matching from minimatch
  // @link <https://github.com/isaacs/minimatch#usage>
  packageFiles: [
    'inc/**',
    'vendor/**',
    'dist/**',
    '*.php',
    '*.md',
    'readme.txt',
    'languages/**',
    'layouts/**',
    'LICENSE',
    '*.css',
  ],
  // Path to package directory, relative to the root
  packageDirPath: 'package',
};
