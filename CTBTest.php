<?php

namespace LokiMcFly\CTBLocker\Test;

use PHPUnit_Framework_TestCase;

/**
 * @author Marcus Jenz
 */
class CTBTest extends PHPUnit_Framework_TestCase
{

    const FILENAME = "config.json";

    private function load()
    {
        $content =file_get_contents(self::FILENAME);
        return json_decode($content, true)['sites'];
    }


    public function test(){
        $sites = $this->load();
        foreach($sites as $url){
            $content = file_get_contents($url);
            $this->assertFalse(strstr($content, "CTB"));
        }

        $this->assertTrue(true);
    }

}