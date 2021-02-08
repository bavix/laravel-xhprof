# Laravel XHProf

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bavix/laravel-xhprof/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bavix/laravel-xhprof/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/bavix/laravel-xhprof/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bavix/laravel-xhprof/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bavix/laravel-xhprof/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bavix/laravel-xhprof/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/bavix/laravel-xhprof/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

[![Package Rank](https://phppackages.org/p/bavix/laravel-xhprof/badge/rank.svg)](https://packagist.org/packages/bavix/laravel-xhprof)
[![Latest Stable Version](https://poser.pugx.org/bavix/laravel-xhprof/v/stable)](https://packagist.org/packages/bavix/laravel-xhprof)
[![Latest Unstable Version](https://poser.pugx.org/bavix/laravel-xhprof/v/unstable)](https://packagist.org/packages/bavix/laravel-xhprof)
[![License](https://poser.pugx.org/bavix/laravel-xhprof/license)](https://packagist.org/packages/bavix/laravel-xhprof)
[![composer.lock](https://poser.pugx.org/bavix/laravel-xhprof/composerlock)](https://packagist.org/packages/bavix/laravel-xhprof)

Laravel XHProf - Library for profiling in production.

* **Vendor**: bavix
* **Package**: Laravel XHProf
* **Version**: [![Latest Stable Version](https://poser.pugx.org/bavix/laravel-xhprof/v/stable)](https://packagist.org/packages/bavix/laravel-xhprof)
* **Laravel Version**: `5.5`, `5.6`, `5.7`, `5.8`, `6.0`, `7.0`, `8.0`
* **PHP Version**: 7.1+ 
* **[Composer](https://getcomposer.org/):** `composer require bavix/laravel-xhprof`

### Get Started

1. Install xhprof extension for PHP:
```bash
pecl install xhprof
```

2. Add in php.ini or other included config (xhprof.ini):
```bash
extension=xhprof.so
xhprof.output_dir=/tmp/xhprof
```

3. Restart PHP:
```bash
sudo systemctl restart fp2-php72-fpm.service
```

4. Check XHProf in PHP Info:
```bash
php -i | grep xhprof
```

Result:

```bash
/opt/php72/conf.d/xhprof.ini,
xhprof
xhprof support => enabled
xhprof.collect_additional_info => 0 => 0
xhprof.output_dir => /tmp/xhprof => /tmp/xhprof
xhprof.sampling_depth => 2147483647 => 2147483647
xhprof.sampling_interval => 100000 => 100000

```

5. Add domain for view results profiling (xhprof.domain.ru).

6. Download library for view:

```bash
cd /var/www/xhprof.domain.ru;
wget http://pecl.php.net/get/xhprof-0.9.4.tgz
gzip -d xhprof-0.9.4.tgz
tar -xvf xhprof-0.9.4.tar
```

7. Change root path in Nginx config for this domain:
`set $root_path /var/www/xhprof.domain.ru/xhprof-0.9.4/xhprof_html;`

8. Install this package:
```bash
composer req bavix/laravel-xhprof --dev
```

9. Create config xhprof.php to Laravel in `config` dir (if empty):

```php
<?php
return [
    'path' => base_path('../xhprof.domain.ru/xhprof-0.9.4'),
    'enabled' => true,
    'freq' => 1
];
```

10. If you have old laravel (<=5.4), register the service provider by add this line `\Bavix\XHProf\XHProfServiceProvider::class` in your `/config/app.php`.
If laravel 5.5 and older then skip this step.

11. Reload page Laravel site and go to xhprof.domain.ru

Enjoy!

I wrote the [instructions](https://github.com/bavix/laravel-xhprof/issues/9#issuecomment-703891348) [@wdda](https://github.com/wdda), thank you. 

---
Supported by

[![Supported by JetBrains](https://cdn.rawgit.com/bavix/development-through/46475b4b/jetbrains.svg)](https://www.jetbrains.com/)
