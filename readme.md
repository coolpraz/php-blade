PHP Blade Template Engine
=====

The standalone version of latest [Laravel's Blade templating engine](http://laravel.com/docs/5.4/blade) for use outside of Laravel.

Installation
------------

Install using composer:

```bash
composer require coolpraz/php-blade
```

Usage
-----

Create a Blade instance by passing it the folder(s) where your view files are located, and a cache folder. Render a template by calling the `make` method. More information about the Blade templating engine can be found on http://laravel.com/docs/5.4/blade.

```php
require __DIR__ . '/vendor/autoload.php';

use Coolpraz\PhpBlade\PhpBlade;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new PhpBlade($views, $cache);

echo $blade->view()->make('meta', ['name' => 'John Doe']);
```

Now you can easily create a directive by calling the ``compiler()`` function

```php
$blade->compiler()->directive('datetime', function ($expression) {
    return "<?php echo with({$expression})->format('F d, Y g:i a'); ?>";
});

{{-- In your Blade Template --}}
<?php $dateObj = new DateTime('2017-01-01 23:59:59') ?>
@datetime($dateObj)
```

The Blade instances passes all methods to the internal view factory. So you can use all blade features as described in the [Blade documentation](http://laravel.com/docs/5.3/views), please visit site for more information.

Integrations
-----
You can use PHP Blade with any framework, vanilla php script or can be use developing any plugins for CMS.