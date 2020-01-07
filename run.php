<?php
    include('vendor/autoload.php');

    /*
    *    Both modes are accepted by passing a url or path from a file to the object's constructor.
    */

    // $obj = new VitorMarcelino\ChallengeSanar\Scraper('http://php.net/manual/en/function.file-get-contents.php');
    // OR
    $obj = new VitorMarcelino\ChallengeSanar\Scraper('test.txt');

    var_dump($obj->getCountWords());