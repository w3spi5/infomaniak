<?php

use Rypsx\Infomaniak\InfomaniakLite;

require __DIR__ . '/../vendor/autoload.php';

try {

    /**
     * `login`   is the username you are using on Infomaniak admin
     * `passwd`  is the password you are using on Infomaniak admin
     * `rate` 	 is the rate you want select. Eg : 128 / 96 / 64 or string like low / high, etc.
     * `codec`   is the type of codec you want to select. Eg : mp3 / aac, etc.
     */
    
    $im = new Infomaniak(`login`, `passwd`, `128`, `mp3`);
    

} catch (\Exception $e) {
    print $e->getMessage();
}

var_dump($im);
