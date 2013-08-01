Установка
=========

Для установки необходимо добавить в composer.json следующие строки

```json
{
    "repositories": [
        {
            "type": "composer",
            "url": "http://packages.dev.infonet.by/"
        }
    ],

    "require": {
        "zf2/stdlib-assetic": "1.*"
    },
}

```

После этого в `config/application.config.php` нужно в раздел `modules` добавить модуль `StdlibAssetic`

В настройках Assetic'а теперь можно использовать уже сконфигурированные фильтры

 * StdUglifyFilter (требует npm модуль uglify-js)
 * StdCoffeeFilter (требует npm модуль coffee-script)
 * StdLessFilter (требует npm модуль less)
 * StdCssoFilter (требует npm модуль csso)

```php
    'admin_js' => array(
        'assets' => array(
            // ...
        ),
        'filters' => array('?StdUglifyFilter'),
    ),
```

или


```php
    'admin_js' => array(
        'assets' => array(
            // ...
        ),
        'filters' => array(
            '?StdUglifyFilter' => ''
        ),
    ),
```