Infomaniak PHP API
=======================

[![Latest Stable Version](https://poser.pugx.org/rypsx/infomaniak/v/stable?format=flat-square)](https://packagist.org/packages/rypsx/infomaniak) [![Total Downloads](https://poser.pugx.org/rypsx/infomaniak/downloads?format=flat-square)](https://packagist.org/packages/rypsx/infomaniak) [![License](https://poser.pugx.org/rypsx/infomaniak/license?format=flat-square)](https://packagist.org/packages/rypsx/infomaniak) [![Monthly Downloads](https://poser.pugx.org/rypsx/infomaniak/d/monthly?format=flat-square)](https://packagist.org/packages/rypsx/infomaniak)
[![Latest Stable Version](https://poser.pugx.org/rypsx/commeaucinema/v/stable?format=flat-square)](https://packagist.org/packages/rypsx/commeaucinema) [![Total Downloads](https://poser.pugx.org/rypsx/commeaucinema/downloads?format=flat-square)](https://packagist.org/packages/rypsx/commeaucinema) [![License](https://poser.pugx.org/rypsx/commeaucinema/license?format=flat-square)](https://packagist.org/packages/rypsx/commeaucinema) [![Monthly Downloads](https://poser.pugx.org/rypsx/commeaucinema/d/monthly?format=flat-square)](https://packagist.org/packages/rypsx/commeaucinema)[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f1cf15bf-b173-411a-84f4-c32f5469b8da/mini.png)](https://insight.sensiolabs.com/projects/f1cf15bf-b173-411a-84f4-c32f5469b8da)
### [Access to English version](#english)

Ce package vous permet d'intégrer les statistiques de votre flux hébergé par Infomaniak dans votre projet. 

## Présentation

Ce package vous permet d'avoir :

1. L'état de vos stream audio
2. Le nombre d'auditeurs actuellement et le maximum atteint
3. Le détail des auditeurs en temps réel (+ nouveau paramètre pour les trier selon la durée d'écoute)
4. **Les informations de localisation sur les auditeurs en cours d'écoute (NOUVEAU)**

## [Utilisation](#usage)

## Requis

1. PHP5
2. [Carbon](https://github.com/briannesbitt/carbon)
3. [Rypsx\IpApi](https://github.com/rypsx/ipapi)

## Composer

Si vous utilisez [Composer](https://getcomposer.org/), vous pouvez ajouter ce package en entrant ceci dans votre terminal :

    composer require rypsx/infomaniak

ou en éditant le fichier `composer.json`, tel que :

    {
    "require": {
      "rypsx/infomaniak": "^3.1"
    }

## [Exemple de retour](#exretour)

### Version 2
- Correction de l'intégration via composer. Le projet est maintenant utilisable directement en utilisant les namespaces
- Possibilité de classer par la durée d'écoute les auditeurs actuels. Dernier paramètre de l'appel de la classe
- Elargissement de la classe à d'autres type de codec et de débit
- Corrections diverses

### Version 3.0
- Corrections de bugs
- Ajout de la class IpApi  afin d'obtenir les informations de localisation des auditeurs (facultatif)

### Version 3.1
- Ajout d'une classe "Lite" permettant d'obtenir les informations essentielles uniquement

---

## English Version <a id="english"></a> 

This package allows you to integrate the statistics of your feed hosted by Infomaniak in your project.

## Presentation

This package allows you to have :

1. The state of audio streams
2. The number of listeners in real time and maximum
3. Details of listeners in real time  (+ new parameter to sort or not them according to playing time)
4. **The location information on listeners while listening (NEW)**

## Usage Example / Utilisation <a id="usage"></a> 

```php
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
    

    	// Getting only Flux state, Live stats & current listeners informations
    	// $im = new Infomaniak(`login`, `passwd`, `128`, `mp3`);

    	// Getting all informations :: TYPICALLY EXAMPLE for version 3
    	$im = new Infomaniak(`login`, `passwd`, 128, `mp3`, true, true);
    
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
?>
```

## Required

1. PHP5
2. [Carbon](https://github.com/briannesbitt/carbon)
3. [Rypsx\IpApi](https://github.com/rypsx/ipapi)


## Composer

If you use [Composer](https://getcomposer.org/), you can add this package from your terminal with :

    composer require rypsx/infomaniak

or by editing `composer.json`, like that :

    {
    "require": {
      "rypsx/infomaniak": "^3.1"
    }

## Output example / Example de retour  <a id="exretour"></a>

```php
object(Rypsx\Infomaniak\Infomaniak)[3]
  protected 'login' => string '****' (length=12)
  protected 'passwd' => string '****' (length=8)
  protected 'rate' => string '128' (length=3)
  protected 'codec' => string 'mp3' (length=3)
  public 'erreur' => null
  public 'updateDate' => string '2016-09-18 13:39:14' (length=19)
  public 'flux' => 
    object(Rypsx\Infomaniak\FluxState)[2]
      public 'principal' => string 'UP' (length=2)
      public 'backup' => string 'UP' (length=2)
  public 'live' => 
    object(Rypsx\Infomaniak\LiveStats)[5]
      public 'peak' => int 154
      public 'current' => int 6
  public 'current' => 
    array (size=6)
      27020 => 
        object(Rypsx\Infomaniak\CurrentListeners)[36]
          public 'ip' => string '****' (length=13)
          public 'dureeEcoute' => string '8 heures' (length=8)
          public 'ipApi' => 
            object(Rypsx\Ipapi\Ipapi)[34]
              public 'erreur' => null
              public 'date' => string '2016-09-18 13:39:40' (length=19)
              public 'ipAdr' => string '****' (length=13)
              public 'ip2long' => int ****
              public 'ipapi' => 
                object(Rypsx\Ipapi\IpRequest)[18]
                  public 'erreur' => 
                    array (size=0)
                      empty
                  public 'status' => string 'success' (length=7)
                  public 'pays' => string 'United States' (length=13)
                  public 'paysCode' => string 'US' (length=2)
                  public 'region' => string '****' (length=8)
                  public 'ville' => string '****' (length=7)
                  public 'cp' => string '****' (length=5)
                  public 'latitude' => string '****' (length=7)
                  public 'longitude' => string '****' (length=8)
                  public 'timezone' => string 'America/Chicago' (length=15)
                  public 'isp' => string '****' (length=13)
      8535 => 
        object(Rypsx\Infomaniak\CurrentListeners)[39]
          public 'ip' => string '****' (length=11)
          public 'dureeEcoute' => string '2 heures' (length=8)
          public 'ipApi' => 
            object(Rypsx\Ipapi\Ipapi)[37]
              public 'erreur' => null
              public 'date' => string '2016-09-18 13:39:40' (length=19)
              public 'ipAdr' => string '****' (length=11)
              public 'ip2long' => int ****
              public 'ipapi' => 
                object(Rypsx\Ipapi\IpRequest)[27]
                  public 'erreur' => 
                    array (size=0)
                      empty
                  public 'status' => string 'success' (length=7)
                  public 'pays' => string 'Germany' (length=7)
                  public 'paysCode' => string 'DE' (length=2)
                  public 'region' => string '****' (length=7)
                  public 'ville' => string '****' (length=9)
                  public 'cp' => string '' (length=0)
                  public 'latitude' => string '****' (length=6)
                  public 'longitude' => string '****' (length=7)
                  public 'timezone' => string 'Europe/Berlin' (length=13)
                  public 'isp' => string '****' (length=19)
      6914 => 
        object(Rypsx\Infomaniak\CurrentListeners)[30]
          public 'ip' => string '****' (length=11)
          public 'dureeEcoute' => string '2 heures' (length=8)
          public 'ipApi' => 
            object(Rypsx\Ipapi\Ipapi)[7]
              public 'erreur' => null
              public 'date' => string '2016-09-18 13:39:40' (length=19)
              public 'ipAdr' => string '****' (length=11)
              public 'ip2long' => int ****
              public 'ipapi' => 
                object(Rypsx\Ipapi\IpRequest)[21]
                  public 'erreur' => 
                    array (size=0)
                      empty
                  public 'status' => string 'success' (length=7)
                  public 'pays' => string 'France' (length=6)
                  public 'paysCode' => string 'FR' (length=2)
                  public 'region' => string '****' (length=17)
                  public 'ville' => string '****' (length=17)
                  public 'cp' => string '****' (length=5)
                  public 'latitude' => string '****' (length=7)
                  public 'longitude' => string '****' (length=7)
                  public 'timezone' => string 'Europe/Paris' (length=12)
                  public 'isp' => string '****' (length=3)
      4605 => 
        object(Rypsx\Infomaniak\CurrentListeners)[42]
          public 'ip' => string '****' (length=13)
          public 'dureeEcoute' => string '1 heure' (length=7)
          public 'ipApi' => 
            object(Rypsx\Ipapi\Ipapi)[40]
              public 'erreur' => null
              public 'date' => string '2016-09-18 13:39:40' (length=19)
              public 'ipAdr' => string '****' (length=13)
              public 'ip2long' => int ****
              public 'ipapi' => 
                object(Rypsx\Ipapi\IpRequest)[12]
                  public 'erreur' => 
                    array (size=0)
                      empty
                  public 'status' => string 'success' (length=7)
                  public 'pays' => string 'France' (length=6)
                  public 'paysCode' => string 'FR' (length=2)
                  public 'region' => string '****' (length=14)
                  public 'ville' => string '****' (length=5)
                  public 'cp' => string '****' (length=5)
                  public 'latitude' => string '****' (length=7)
                  public 'longitude' => string '****' (length=6)
                  public 'timezone' => string 'Europe/Paris' (length=12)
                  public 'isp' => string '****' (length=6)
      2105 => 
        object(Rypsx\Infomaniak\CurrentListeners)[10]
          public 'ip' => string '****' (length=13)
          public 'dureeEcoute' => string '35 min' (length=6)
          public 'ipApi' => 
            object(Rypsx\Ipapi\Ipapi)[4]
              public 'erreur' => null
              public 'date' => string '2016-09-18 13:39:40' (length=19)
              public 'ipAdr' => string '****' (length=13)
              public 'ip2long' => int ****
              public 'ipapi' => 
                object(Rypsx\Ipapi\IpRequest)[11]
                  public 'erreur' => 
                    array (size=0)
                      empty
                  public 'status' => string 'success' (length=7)
                  public 'pays' => string 'France' (length=6)
                  public 'paysCode' => string 'FR' (length=2)
                  public 'region' => string '****' (length=17)
                  public 'ville' => string '****' (length=9)
                  public 'cp' => string '****' (length=5)
                  public 'latitude' => string '****' (length=7)
                  public 'longitude' => string '****' (length=7)
                  public 'timezone' => string 'Europe/Paris' (length=12)
                  public 'isp' => string '****' (length=8)
      467 => 
        object(Rypsx\Infomaniak\CurrentListeners)[33]
          public 'ip' => string '****' (length=13)
          public 'dureeEcoute' => string '8 min' (length=5)
          public 'ipApi' => 
            object(Rypsx\Ipapi\Ipapi)[31]
              public 'erreur' => null
              public 'date' => string '2016-09-18 13:39:40' (length=19)
              public 'ipAdr' => string '****' (length=13)
              public 'ip2long' => int ****
              public 'ipapi' => 
                object(Rypsx\Ipapi\IpRequest)[15]
                  public 'erreur' => 
                    array (size=0)
                      empty
                  public 'status' => string 'success' (length=7)
                  public 'pays' => string 'France' (length=6)
                  public 'paysCode' => string 'FR' (length=2)
                  public 'region' => string '****' (length=14)
                  public 'ville' => string '****' (length=26)
                  public 'cp' => string '****' (length=5)
                  public 'latitude' => string '****' (length=7)
                  public 'longitude' => string '****' (length=6)
                  public 'timezone' => string 'Europe/Paris' (length=12)
                  public 'isp' => string '****' (length=8)
  private 'counterIpApi' => int 6
```

**Thank you note that sensitive informations in the above example like IP adress or localisation informations were deliberately masked by `****`, because it is the result of a real test**

### Version 2
- Correction integration via Composer. The project is now used directly by using namespaces
- Ability to classify the playing time the current auditors. Last parameter of the class call
- Enlargement of the class to other codec type and flow
- Various fixes

### Version 3.0
- Corrections of bugs
- Adding IPAPI class to get location information from listeners (optional)

### Version 3.1
- Adding "Lite" class to obtain essential informations only

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