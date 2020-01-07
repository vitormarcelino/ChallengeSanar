<?php

namespace VitorMarcelino\ChallengeSanar;

use GuzzleHttp\Client;

class Scraper
{
    private $content;

    function __construct($target) {
        if (filter_var($target, FILTER_VALIDATE_URL)) {
            $client = new Client([
                'timeout'  => 5.0,
            ]);
            $this->content = (string)$client->get($target)->getBody();
        }
        if(!$this->content && is_file($target)) {
            $this->content = file_get_contents($target);
        }
    }

    public function getCountWords() {
        $content = strip_tags($this->content);
        $content = str_replace( array( '\'', '"', ',' , ';', '<', '>', '.' ), ' ', $content);
        $wordsCount = [];
        foreach (explode(" ", $content) as $item) {
            $word = trim($item);
            $word = preg_replace( "/\r|\n/", "", $word);
            if(!empty($word)) {
                if(!isset($wordsCount[$word])) {
                    $wordsCount[strtolower($word)] = 1;    
                } else {
                    $wordsCount[strtolower($word)]++;
                }
            }
        }
        asort($wordsCount);
        return $wordsCount;
    }


}