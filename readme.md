Infomaniak PHP API
=======================

### [Access to English version](#english)

Ce package vous permet d'intégrer les statistiques de votre flux hébergé par Infomaniak dans votre projet. 

## Présentation

Ce package vous permet d'avoir :

1. L'état de vos stream audio
2. Le nombre d'auditeurs actuellement et le maximum atteint
3. Le détail des auditeurs en temps réel (+ nouveau paramètre pour les trier selon la durée d'écoute)

## [Utilisation](#usage)

## Requis

PHP5 et [Carbon](https://github.com/briannesbitt/carbon).

## Composer

Si vous utilisez [Composer](https://getcomposer.org/), vous pouvez ajouter ce package en entrant ceci dans votre terminal :

    composer require rypsx/infomaniak

ou en éditant le fichier `composer.json`, tel que :

    {
    "require": {
      "rypsx/infomaniak": "^2.x"
    }

## [Exemple de retour](#exretour)

### Version 2.0
- Correction de l'intégration via composer. Le projet est maintenant utilisable directement en utilisant les namespaces
- Possibilité de classer par la durée d'écoute les auditeurs actuels. Dernier paramètre de l'appel de la classe
- Elargissement de la classe à d'autres type de codec et de débit
- Corrections diverses

---

## English Version <a id="english"></a> 

This package allows you to integrate the statistics of your feed hosted by Infomaniak in your project.

## Presentation

This package allows you to have :

1. The state of audio streams
2. The number of listeners in real time and maximum
3. Details of listeners in real time  (+ new parameter to sort or not them according to playing time)

## Usage Example / Utilisation <a id="usage"></a> 

```php
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
      "rypsx/infomaniak": "^2.x"
    }

## Output example / Example de retour  <a id="exretour"></a>

```php
	object(Rypsx\Infomaniak\Infomaniak)[3]
	  protected 'login' => string '****' (length=12)
	  protected 'passwd' => string '****' (length=8)
	  protected 'rate' => int 128
	  protected 'codec' => string 'mp3' (length=3)
	  public 'erreur' => null
	  public 'updateDate' => string '2016-07-10 11:10:48' (length=19)
	  public 'flux' => 
	    object(Rypsx\Infomaniak\FluxState)[2]
	      public 'principal' => string 'UP' (length=2)
	      public 'backup' => string 'UP' (length=4)
	  public 'live' => 
	    object(Rypsx\Infomaniak\LiveStats)[5]
	      public 'peak' => int ****
	      public 'current' => int ****
	  public 'current' => 
	    array (size=10)
	      94261 => 
	        object(Rypsx\Infomaniak\CurrentListeners)[7]
	          public 'ip' => string '****' (length=13)
	          public 'dureeEcoute' => string '26 heures' (length=9)
	      13481 => 
	        object(Rypsx\Infomaniak\CurrentListeners)[16]
	          public 'ip' => string '****' (length=14)
	          public 'dureeEcoute' => string '4 heures' (length=8)
	      10145 => 
	        object(Rypsx\Infomaniak\CurrentListeners)[11]
	          public 'ip' => string '****' (length=13)
	          public 'dureeEcoute' => string '3 heures' (length=8)
	      8521 => 
	        object(Rypsx\Infomaniak\CurrentListeners)[10]
	          public 'ip' => string '****' (length=12)
	          public 'dureeEcoute' => string '2 heures' (length=8)
	      3614 => 
	        object(Rypsx\Infomaniak\CurrentListeners)[18]
	          public 'ip' => string '80.15.123.19' (length=12)
	          public 'dureeEcoute' => string '1 heure' (length=7)
	      3147 => 
	        object(Rypsx\Infomaniak\CurrentListeners)[14]
	          public 'ip' => string '****' (length=14)
	          public 'dureeEcoute' => string '52 min' (length=6)
	      861 => 
	        object(Rypsx\Infomaniak\CurrentListeners)[15]
	          public 'ip' => string '****' (length=14)
	          public 'dureeEcoute' => string '14 min' (length=6)
```

Thank you note that sensitive informations in the above example were deliberately masked by `****`


## License

**The MIT License (MIT)**

**Copyright (c) 2016 Rypsx Dev**

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