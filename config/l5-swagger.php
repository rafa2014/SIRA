<?php

return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'SIRA API',
            ],
            'routes' => [
                /*
                 * Route for accessing api documentation interface
                 */
                'api' => 'api/documentation',
            ],
            /*'paths' => [
                'docs' => storage_path('api-docs'),
                'swagger_ui_assets_path' => public_path('vendor/swagger-api/swagger-ui/'),
                'annotations' => [
                    base_path('app'),
                ],
                'docs_json' => 'api-docs.json',
                'docs_yaml' => 'api-docs.yaml',
                'format_to_use_for_docs' => env('L5_SWAGGER_FORMAT_TO_USE_FOR_DOCS', 'json'),
                'ui' => [
                    'display' => [
                        'default_model_expand_depth' => 2,
                        'default_model_rendering' => 'example',
                        'default_models_expand_depth' => 1,
                        'doc_expansion' => 'none',
                        'filter' => false,
                        'max_displayed_tags' => null,
                        'operations_sorter' => null,
                        'show_extensions' => false,
                        'show_common_extensions' => false,
                        'tags_sorter' => null,
                        'validator_url' => null,
                    ],
                ],
            ],*/
            'paths' => [
                'docs' => storage_path('api-docs'),
                'swagger_ui_assets_path' => public_path('vendor/swagger-api/swagger-ui/'),
                'annotations' => [
                    base_path('app'),
                ],
            ],

        ],
    ],
];
