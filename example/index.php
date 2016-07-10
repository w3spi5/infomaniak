<?php

use Rypsx\Infomaniak\Infomaniak;

require __DIR__ . '/../vendor/autoload.php';

try {

/**
     * `login`  is the username you are using on Infomaniak
     * `passwd` is the password you are using on Infomaniak
     * `rate` 	is the rate you want select. Eg : 128 / 96 / 64 or string like low / high, etc.
     * `codec`  is the type of codec you want to select. Eg : mp3 / aac, etc.
     * 			The last parameter MUST be set to true or false. By setting true, it allow you to sort current listener by decreasing playing time. Default FASLE
     */
    
    $im = new Infomaniak('login', 'passwd', 'rate', 'codec', true);
    // ex : $im = new Infomaniak('login', 'passwd', '128', 'mp3', true);
    
    var_dump($im);

} catch (\Exception $e) {
    print $e->getMessage();
}
