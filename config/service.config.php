<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'EnliteUglifyFilter' => 'StdlibAssetic\Filter\UglifyFilterFactory',
            'EnliteCoffeeFilter' => 'StdlibAssetic\Filter\CoffeeFilterFactory',
            'EnliteLessFilter' => 'StdlibAssetic\Filter\LessFilterFactory',
            'EnliteCssoFilter' => 'StdlibAssetic\Filter\CssoFilterFactory',
            'EnliteUglifycssFilter' => 'StdlibAssetic\Filter\UglifycssFilterFactory',
        )
    )
);