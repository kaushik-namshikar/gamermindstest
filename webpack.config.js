const path = require('path');

module.exports = {
  mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
  entry: {
    // Add your theme entry points here
    // For example: 'theme': './wp-content/themes/your-theme/src/index.js'
    // Since no theme exists yet, we'll create a minimal entry
    'main': './src/index.js' // Placeholder
  },
  output: {
    path: path.resolve(__dirname, 'dist/assets'),
    filename: '[name].js',
    clean: true,
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
        test: /\.css$/,
        use: ['style-loader', 'css-loader']
      },
      {
        test: /\.scss$/,
        use: ['style-loader', 'css-loader', 'sass-loader']
      }
    ]
  },
  resolve: {
    extensions: ['.js', '.json']
  },
  devtool: process.env.NODE_ENV === 'production' ? false : 'source-map'
};