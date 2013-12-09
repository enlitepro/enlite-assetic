Assetic filter via module for Zend Framework 2
==============================================


INSTALL
=======

The recommended way to install is through composer.

```json
{
    "require": {
        "enlitepro/enlite-assetic": "1.*"
    }
}
```

USAGE
=====

Add `EnliteAssetic` to your `config/application.config.php` to enable module.


 * EnliteUglifyFilter (require npm module uglify-js)
 * EnliteCoffeeFilter (require npm module coffee-script)
 * EnliteLessFilter (require npm module less)
 * EnliteCssoFilter (require npm module csso)
 * EnliteUglifycssFilter (require npm module uglifycss)

```php
    'admin_js' => array(
        'assets' => array(
            // ...
        ),
        'filters' => array('?EnliteUglifyFilter'),
    ),
```

or


```php
    'admin_js' => array(
        'assets' => array(
            // ...
        ),
        'filters' => array(
            '?EnliteCoffeeFilter' => ''
        ),
    ),
```


Capistrano revision inject
==========================

```php
    'service_manager' => array(
        'aliases' => array(
            'AsseticConfiguration' => 'EnliteAssetic\Configuration'
        ),
    )
```

