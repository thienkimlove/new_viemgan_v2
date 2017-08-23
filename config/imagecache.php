<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Name of route
    |--------------------------------------------------------------------------
    |
    | Enter the routes name to enable dynamic imagecache manipulation.
    | This handle will define the first part of the URI:
    | 
    | {route}/{template}/{filename}
    | 
    | Examples: "images", "img/cache"
    |
    */
   
    'route' => 'img/cache',

    /*
    |--------------------------------------------------------------------------
    | Storage paths
    |--------------------------------------------------------------------------
    |
    | The following paths will be searched for the image filename, submited 
    | by URI. 
    | 
    | Define as many directories as you like.
    |
    */
    
    'paths' => array(
        public_path('files/images'),
    ),

    /*
    |--------------------------------------------------------------------------
    | Manipulation templates
    |--------------------------------------------------------------------------
    |
    | Here you may specify your own manipulation filter templates.
    | The keys of this array will define which templates 
    | are available in the URI:
    |
    | {route}/{template}/{filename}
    |
    | The values of this array will define which filter class
    | will be applied, by its fully qualified name.
    |
    */
   
    'templates' => array(
        'small' => 'Intervention\Image\Templates\Small',
        'medium' => 'Intervention\Image\Templates\Medium',
        'large' => 'Intervention\Image\Templates\Large',
        '507x310' => function($image) {
            return $image->fit(507, 310);
        },
        '226x148' => function($image) {
            return $image->fit(226, 148);
        },
        '301x183' => function($image) {
            return $image->fit(301, 183);
        },
        '126x90' => function($image) {
            return $image->fit(126, 90);
        },

        '326x203' => function($image) {
            return $image->fit(326, 203);
        },

        '120x84' => function($image) {
            return $image->fit(120, 84);
        },

        '114x114' => function($image) {
            return $image->fit(114, 114);
        },

        '276x157' => function($image) {
            return $image->fit(276, 157);
        },

        '58x58' => function($image) {
            return $image->fit(58, 58);
        },

        '190x129' => function($image) {
            return $image->fit(190, 129);
        },
    ),

    /*
    |--------------------------------------------------------------------------
    | Image Cache Lifetime
    |--------------------------------------------------------------------------
    |
    | Lifetime in minutes of the images handled by the imagecache route.
    |
    */
   
    'lifetime' => 43200,

);
