<?php
/**
 * @author Marcus Jenz
 */

namespace LokiMcFly\CTBLocker\Test;


class LoadConfig
{
    const FILENAME = "config.json";

    public static function load()
    {
        $content =file_get_contents(self::FILENAME);
        return json_decode($content);
    }
}