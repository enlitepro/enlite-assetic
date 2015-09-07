<?php

return array(
    'service_manager' => array(
        'aliases' => array(
            'AsseticService' => 'EnliteAssetic\Service'
        ),
        'factories' => array(
            'EnliteUglifyFilter' => 'EnliteAssetic\Filter\UglifyFilterFactory',
            'EnliteCoffeeFilter' => 'EnliteAssetic\Filter\CoffeeFilterFactory',
            'EnliteLessFilter' => 'EnliteAssetic\Filter\LessFilterFactory',
            'EnliteCssoFilter' => 'EnliteAssetic\Filter\CssoFilterFactory',
            'EnliteUglifycssFilter' => 'EnliteAssetic\Filter\UglifycssFilterFactory',
            'EnliteNgminFilter' => 'EnliteAssetic\Filter\NgminFilterFactory',
            'HandlebarsFilter' => 'EnliteAssetic\Filter\HandlebarsFilterFactory',
            'CssVersionUrlFilter' => 'EnliteAssetic\Filter\CssVersionUrlFilterFactory',
            //
            'EnliteAssetic\Configuration' => 'EnliteAssetic\ConfigurationFactory',
            'EnliteAssetic\Service' => 'EnliteAssetic\ServiceFactory',
            'EnliteHtmlMinifierFilter' => 'EnliteAssetic\Filter\HtmlMinifierFilterFactory'
        ),

        'invokables' => array(
            'Assetic\AssetManager'   => 'EnliteAssetic\LazyAssetManager',
        )
    )
);