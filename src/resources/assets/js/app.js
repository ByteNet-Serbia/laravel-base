/**
 * 2017-03-30 by Byte Net
 *
 * This article assumes that you have [npmjs][@link https://www.npmjs.com/] already installed and ready to use.
 *
 * First, to add 'admin-lte' npm package to your local machine, type the below into your command line.
 * --- $ npm i admin-lte
 * or by manually editing your package.json file. Just make sure to create a reference to 'admin-lte' in the dependencies property.
 * --- {
 * ---    "dependencies": {
 * ---        "admin-lte": "^2.3.11"
 * ---    }
 * --- }
 * You’ll notice a node_modules directory appear in your root where the package is now installed.
 *
 * Next, you have to include ROOT/resources/assets/vendor contents to your main JS file.
 * Thus, your 'app.js' file usually looks like
 * --- require('./../vendor/bytenet-base/js/app');
 *
 * Finally, customize your 'webpack.mix.js' file and compile assets (Laravel Mix):
 *  --- $ npm run production
 */

// AdminLTE
require('./admin-lte');

// Ponify - Beautiful JavaScript notifications.
require('./pnotify');
