<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'EnliteUglifyFilter' => 'EnliteAssetic\Filter\UglifyFilterFactory',
            'EnliteCoffeeFilter' => 'EnliteAssetic\Filter\CoffeeFilterFactory',
            'EnliteLessFilter' => 'EnliteAssetic\Filter\LessFilterFactory',
            'EnliteCssoFilter' => 'EnliteAssetic\Filter\CssoFilterFactory',
            'EnliteUglifycssFilter' => 'EnliteAssetic\Filter\UglifycssFilterFactory',
            'EnliteNgminFilter' => 'EnliteAssetic\Filter\NgminFilterFactory',
            //
            'EnliteAssetic\Configuration' => 'EnliteAssetic\ConfigurationFactory'
        ),

        'invokables' => array(
            'Assetic\AssetManager'   => 'EnliteAssetic\LazyAssetManager',
        )
    )
);