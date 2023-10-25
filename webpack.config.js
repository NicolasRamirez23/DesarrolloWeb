const path = require('path')

module.exports = {
    mode: 'development',
    entry: './dashboard/script.js',
    output: {
        path: path.resolve(__dirname, 'dashboard'),
        filename: 'bundle.js'
    },
    watch: true
}