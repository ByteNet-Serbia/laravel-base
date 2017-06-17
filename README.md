# ByteNet\LaravelBase
Laravel base package, which offers authentication and a blank panel

# Base

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel Base central package, which includes:
- a customized version of Laravel's authentication interface; // TODO
- basic management page (edit password, name, email);
- basic dashboard page; // TODO
- pretty error pages; // TODO
- admin-wide alerts system (notification bubbles); // TODO
- roles / permissions; // TODO

## Install on Laravel 5.4

1. Run in your terminal:
   ``` bash
   $ composer require bytenet/laravel-base
   ```

2. Add the service providers in config/app.php:
   ``` php
   ByteNet\LaravelBase\BaseServiceProvider::class,
   ```
   
3. Then run a few commands in the terminal:
   ``` bash
   $ php artisan vendor:publish --provider="ByteNet\LaravelBase\BaseServiceProvider"
   ```

4. Set Mix Asset content in webpack.mix.js file:
   ```php
   mix.js('resources/assets/js/app.js', 'public/js')
       .sass('resources/assets/sass/app.scss', 'public/css')
   
       .js('resources/assets/admin/js/app.js', 'public/admin/js')
       .sass('resources/assets/admin/sass/app.scss', 'public/admin/css')
   
   .sourceMaps();
   
   if (mix.config.inProduction) {
       mix.version();
   }
   ```

5. This article assumes that you have [npmjs][link-npmjs] already installed and ready to use. 

   1. To add 'admin-lte' npm package to your local machine, type the below into your command line. 
   ``` bash 
   $ npm install admin-lte 
   ```
   or by manually editing your package.json file. Just make sure to create a reference to 'admin-lte' in the dependencies property.
   ``` json
   {
       ...
       "dependencies": {
           ...
           "admin-lte": "^2.3.11",
           "pnotify": "^3.2.0"
           ...
       }
       ...
   }
   ```
   You’ll notice a node_modules directory appear in your root where the package is now installed.

   2. Next, (after step 3) you have new contents in ROOT/resources/assets/vendor directory. You have to include related contents to your main JS and SASS files. 
   Thus, your 'app.js' file usually look like
   ``` js
   ...
   require('./../vendor/bytenet-base/js/app');
   ...
   ```
   and 'app.scss' file look like
   ``` scss
   ...
   @import "./../vendor/bytenet-base/sass/app";
   ...
   ```
   
   3. Finally, customize your 'webpack.mix.js' file and compile assets (Laravel Mix):
   ``` bash 
   $ npm run production
   ```

6. [optional] Change values in ``` config/bytenet/base.php ``` to make the admin panel your own. 
Change menu color, project name, developer name etc.

## Usage 

### User Interface
   1. Register a new admin at ``` yourappname/admin/register ```
   2. Your admin panel will be available at ``` yourappname/admin ```
   3. [optional] If you're building an admin panel, you should close the registration. 
   In ``` config/bytenet/base.php ``` look for ``` registration_open ``` and change it to ``` false ```.

### API
   1. Register a new admin at ``` yourappname/admin/register ```
   2. Your API will be available at ``` yourappname/api ```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Todos

// TODO

## Testing

// TODO

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email office@bytenet.rs instead of using the issue tracker.

## Credits

- [Nikola Zeravcic][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/bytenet/laravel-base.svg?style=flat-square
[ico-license]: https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ByteNet-Serbia/laravel-base.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/bytenet/laravel-base.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/bytenet/base.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/bytenet/laravel-base.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/bytenet/laravel-base
[link-travis]: https://travis-ci.org/ByteNet-Serbia/laravel-base
[link-scrutinizer]: https://scrutinizer-ci.com/g/bytenet/laravel-base/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/bytenet/laravel-base
[link-downloads]: https://packagist.org/packages/bytenet/laravel-base
[link-npmjs]: https://www.npmjs.com
[link-author]: https://github.com/zeravcic
[link-contributors]: ../../contributors
