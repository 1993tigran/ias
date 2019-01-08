<?php

return array(
    'appNameIOSDev'     => array(
        'environment' => 'development',
        'certificate' => storage_path().'/app/ck_dev.pem',
        'passPhrase'  =>'ipush4ias',
        'service'     =>'apns'
    ),
    'appNameIOSProd'     => array(
        'environment' => 'production',
        'certificate' => storage_path().'/app/ck_prod.pem',
        'passPhrase'  =>'ipush4ias',
        'service'     =>'apns'
    ),
    'appNameAndroid' => array(
        'apiKey'      =>'AIzaSyBBMTTkbsdLwWw6bn3bf0ozKl5YO8whn28',
        'service'     =>'gcm'
    )

);