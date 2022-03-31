<?php

namespace Core\Http;


class Router
{
    private static $method = '';

    private static $controller = '';

    /**
     * @param $ctlMethod
     */
    public static function setControllerMethod($ctlMethod)
    {
        $ctlName = key($ctlMethod);

        if (isset($ctlMethod[$ctlName])) {
            self::$method = $ctlMethod[$ctlName];
        }

        self::$controller = $ctlName;

    }

    /**
     * @return string
     */
    public static function getMethod()
    {
        return self::$method;
    }

    /**
     * @return mixed
     */
    public static function getController()
    {
        return self::$controller;
    }
}
