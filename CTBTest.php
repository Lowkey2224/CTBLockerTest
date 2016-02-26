<?php

namespace LokiMcFly\CTBLocker\Test;

use PHPUnit_Framework_TestCase;

/**
 * @author Marcus Jenz
 */
class CTBTest extends PHPUnit_Framework_TestCase
{

    const FILENAME = "config.json";

    private function loadCfg()
    {
        $content =file_get_contents(self::FILENAME);
        return json_decode($content, true)['sites'];
    }


    public function test(){
        $sites = $this->loadCfg();
        foreach($sites as $url){
            $content = file_get_contents($url['url']);
            foreach($url['expectedStrings'] as $string){

                $this->assertTrue(strstr($content, $string)!==false, "String {$string} ist nicht in Seite {$url['url']} vorhanden");
            }
            $this->assertFalse(strstr($content, "CTB"), " CTB kommt auf der Webseite {$url['url']} vor.");
        }
    }

}