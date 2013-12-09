<?php

return array(
    'assetic_configuration' => array(
        'modules' => array(
            /*
             * Application module - assets configuration
             */
            'application' => array(

                # module root path for your css and js files
                'root_path' => realpath(__DIR__ . '/../assets'),
                # collection od assets
                'collections' => array(
                    'application_css' => array(
                        'assets' => array(
                            'css/bootstrap.css',
                            'css/bootstrap-theme.css',
                            'css/style.css',
                        ),
                        'filters' => array(
                            'CssImportFilter' => 'Assetic\Filter\CssImportFilter',
                            'CssRewriteFilter' => 'Assetic\Filter\CssRewriteFilter',
//                            '?EnliteUglifycssFilter'
                        ),
                        'options' => array(
                            'output' => 'base.css'
                        ),
                    ),
                    'compile_css' => array(
                        'assets' => array(
                            '@application_css',
                            '@user_css'
                        ),
                        'options' => array(
                            'output' => 'compile.css'
                        ),
                    ),
                ),
            ),

        ),
        'routes' => array(
            'home' => array(
                '@compile_css',
            )
        ),
    )
);
