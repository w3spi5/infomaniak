# Infomaniak PHP API

This package allows you to integrate infomaniak flow statistics because no API is proposed.
#### This development is in no way associated with Infomaniak and was directed by pure need.

## Presentation

This package allows you to have :

1. The state of audio streams
2. The number of listeners in real time and maximum
3. Details of listeners in real time

## Usage Example

```php
<?php
	use rypsx\Infomaniak;
	
	require __DIR__ . '/vendor/autoload.php';
	
	try {
	    $infomaniak = new Infomaniak('login', 'passwd', 128, 'mp3'); // Or 96 aac or whatever you need
	} catch (Exception $e) {
	    print $e->getMessage();
	}
	
	var_dump($infomaniak);
?>
```

## Required

PHP5 and [Carbon](https://github.com/briannesbitt/carbon).


## Composer

If you use [Composer](https://getcomposer.org/), you can add this package from your terminal with :

    composer require rypsx/infomaniak

or by editing `composer.json`, like that :

    {
    "require": {
      "rypsx/infomaniak": "^1.x"
    }

## License

You can use this package in any project. You just have to remember to remove the copyright notice this below.

**The MIT License (MIT)**

**Copyright (c) 2016 rypsx**

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.