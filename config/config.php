<?php

return [
    /*
     * Array of custom errors
     *
     * <CODE/'CONST'> => <MESSAGE>
     */
    'errors' => [
        //1000 => 'Error message'
        //'SERVER_ERROR' => 'Error message'
    ],

    'keys' => [
        'success' => 'success',
        'payload' => 'payload',

        'validation' => [
            'fields' => 'fields'
        ],

        'meta' => [
            'global' => 'meta',
            'full_url' => 'full_url',
            'query' => 'query',
            'pagination' => 'pagination'
        ],
    ],

    'default' => [
        /*
         * Default value for payload, null or empty array
         *
         * Available values: 'null', 'array'
         */
        'payload' => 'null',

        /*
         * Displaying 'errors' if empty
         *
         * true/false
         */
        'errors' => true
    ]
];
