<?php

    use Rypsx\Infomaniak;

    require __DIR__ . '/vendor/autoload.php';

    try {
	    $infomaniak = new Infomaniak('login', 'passwd', 128, 'mp3');
	} catch (Exception $e) {
	    print $e->getMessage();
	}

    var_dump($infomaniak);