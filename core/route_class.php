<?php

class Route
{
    public static function start() {
        $controller_name = 'Main'; //стандартный контроллер
        $action_name = 'index'; //стандартный метод контроллера
        
        $uri = $_SERVER['REQUEST_URI'];
        $uri = substr($uri, 1);
        if ($uri) $action_name = $uri;
        $controller_name = $controller_name.'Controller'; //формирование имени контроллера
        $action_name = 'action'.$action_name; //формирование имени метода в контроллере
        $controller = new $controller_name();
        if (method_exists($controller, $action_name)) $controller->$action_name(); //проверка наличия метода в контроллере
        else $controller->action404(); //в случае отсутствия метода в контроллере - перенаправление на страницу 404
    }
}