<?php
    require_once 'start.php';

    Session::init_session(); //старт сессии
    Route::start(); //перенапраление запросов, для их дальнейшей обработки
?>