<?php

class CustomError
{
    public function __construct($message) // перенаправление ошибок на отдельную страницу
    {
        $controller = new MainController();
        $controller->actionError($message);
        exit();
    }
}
