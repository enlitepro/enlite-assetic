<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'StdUglifyFilter' => 'StdlibAssetic\Filter\UglifyFilterFactory',
            'StdCoffeeFilter' => 'StdlibAssetic\Filter\CoffeeFilterFactory',
            'StdLessFilter' => 'StdlibAssetic\Filter\LessFilterFactory',
            'StdCssoFilter' => 'StdlibAssetic\Filter\CssoFilterFactory',
            'StdUglifycssFilter' => 'StdlibAssetic\Filter\UglifycssFilterFactory',
        )
    )
);