<?php

return array(
    'assetic_configuration' => array(
        'modules' => array(
            /*
             * Application module - assets configuration
             */
            'user' => array(

                # module root path for your css and js files
                'root_path' => realpath(__DIR__ . '/../assets'),
                # collection od assets
                'collections' => array(
                    'user_css' => array(
                        'assets' => array(
                            'css/style.css',
                        ),
                        'filters' => array(
                            'CssImportFilter' => 'Assetic\Filter\CssImportFilter',
                            'CssRewriteFilter' => 'Assetic\Filter\CssRewriteFilter',
//                            '?EnliteUglifycssFilter'
                        )
                    ),
                ),
            ),

        ),
    )
);
