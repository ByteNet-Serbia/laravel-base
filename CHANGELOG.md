# Change Log

All Notable changes to `bytenet\laravel-base` project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## [0.1.0] - 2017-06-17
### Added
- src/app/Http/Controllers/Auth/ForgotPasswordController.php
- src/app/Http/Controllers/Auth/LoginController.php
- src/app/Http/Controllers/Auth/RegisterController.php
- src/app/Http/Controllers/Auth/ResetPasswordController.php
- src/app/Http/Controllers/BaseApiController.php
- src/app/Http/Middleware/ByteNetAuthenticate.php
- src/app/Http/Requests/FormRequest.php
- src/app/Notifications/ResetPasswordNotification.php
- src/app/Support/helpers.php
- src/config/bytenet/base.php
- src/resources/assets/js/admin-lte.js
- src/resources/assets/js/app.js
- src/resources/assets/js/pnotify.js
- src/resources/assets/sass/_admin_lte.scss
- src/resources/assets/sass/_app.scss
- src/resources/assets/sass/_base.scss
- src/resources/assets/sass/_pnotify.scss
- src/resources/lang/en/base.php
- src/resources/lang/es/base.php
- src/resources/lang/fr/base.php
- src/resources/lang/it/base.php
- src/resources/lang/ro/base.php
- src/resources/lang/sr-Latn/base.php
- src/resources/lang/sr/base.php
- src/resources/views/auth/login.blade.php
- src/resources/views/auth/passwords/email.blade.php
- src/resources/views/auth/passwords/reset.blade.php
- src/resources/views/auth/register.blade.php
- src/resources/views/dashboard.blade.php
- src/resources/views/inc/alerts.blade.php
- src/resources/views/inc/menu.blade.php
- src/resources/views/inc/sidebar.blade.php
- src/resources/views/inc/sidebar_control.blade.php
- src/resources/views/layout.blade.php
- src/resources/views_errors/400.blade.php
- src/resources/views_errors/401.blade.php
- src/resources/views_errors/403.blade.php
- src/resources/views_errors/404.blade.php
- src/resources/views_errors/405.blade.php
- src/resources/views_errors/408.blade.php
- src/resources/views_errors/429.blade.php
- src/resources/views_errors/500.blade.php
- src/resources/views_errors/503.blade.php
- src/routes/api.php
- src/routes/web.php

### Changed
- README.md
- composer.json
- src/BaseServiceProvider.php
- src/app/Http/Controllers/BaseController.php

### Removed
- src/app/Base.php
        
## 0.0.1 - 2017-06-16
### Added
- src/BaseServiceProvider.php
- src/app/Http/Base.php
- src/app/Http/Http/Controllers/BaseController.php
- tests/ByteNet/LaravelBase/BaseTest.php

[0.1.0]: https://github.com/ByteNet-Serbia/laravel-base/compare/v0.0.1...v0.1.0
