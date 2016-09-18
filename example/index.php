<?php

use Rypsx\Infomaniak\Infomaniak;

require __DIR__ . '/../vendor/autoload.php';

try {

    /**
     * `login`   is the username you are using on Infomaniak admin
     * `passwd`  is the password you are using on Infomaniak admin
     * `rate` 	 is the rate you want select. Eg : 128 / 96 / 64 or string like low / high, etc.
     * `codec`   is the type of codec you want to select. Eg : mp3 / aac, etc.
     * `sorted`  This parameter MUST be set to true or false. By setting true,
     *           it allow you to sort current listener by decreasing playing time. DEFAULT FALSE
     * `ipapi`   This parameter MUST be set to true or false. By setting true,
     *           it allow you to get geographic informations about your listeners.
     *           This API allows only 150 queries per minute, so a module is set up to prevent
     *           any query exceeds the 150th. DEFAULT FALSE
     */
    

    /**
     * Some examples showing you how to call the class
     *
     * $im = new Infomaniak(`login`, `passwd`, `128`, `mp3`); // `sorted` and `ipapi` are set to FALSE
     *
     * $im = new Infomaniak(`login`, `passwd`, `128`, `mp3`, `true`, `true`); // TYPICALLY EXAMPLE for version 3.0
     * 
     */
    
    // Get info about geolocation of current listeners
    /*
    foreach ($im->current as $num => $current) {
        var_dump($current->ipApi);
    }
    */
    

} catch (\Exception $e) {
    print $e->getMessage();
}

var_dump($im);
