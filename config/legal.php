<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Package URI
    |--------------------------------------------------------------------------
    |
    | This value is the URI of your package.
    |
    */
    'uri' => env('LEGAL_URI', 'legal'),

    /*
    |--------------------------------------------------------------------------
    | Package API URI
    |--------------------------------------------------------------------------
    |
    | This value is the URI of your package.
    |
    */
    'api' => env('LEGAL_API', 'legal/api'),

    /*
    |--------------------------------------------------------------------------
    | Terms Of Service
    |--------------------------------------------------------------------------
    |
    | Enable Terms Of Service.
    | If you have to show Terms Of Service, then set this to true.
    |
    */
    'tos' => true,

    /*
    |--------------------------------------------------------------------------
    | Privacy Policy
    |--------------------------------------------------------------------------
    |
    | Enable Privacy Policy
    | If you have to show Privacy Policy, then set this to true.
    |
    */
    'pripol' => true,

    /*
    |--------------------------------------------------------------------------
    | Imprint
    |--------------------------------------------------------------------------
    |
    | Enable an imprint.
    | If you have to show an imprint, then set this to true.
    |
    */
    'imprint' => true,

    /*
    |--------------------------------------------------------------------------
    | Name of the documents table.
    |--------------------------------------------------------------------------
    |
    | The default table name of the Document's model is documents.
    | However you can override this default name here in respect of your data
    | structure.
    */
    'documents_table' => 'documents'
];