<?php
    set_include_path(get_include_path().PATH_SEPARATOR.'core'.PATH_SEPARATOR.'controllers'.PATH_SEPARATOR.'models'.PATH_SEPARATOR.'services');
    spl_autoload_extensions('_class.php');
    spl_autoload_register(); //автоматическое подключение классов в приложении

    define('DIR_TMPL', './tmpl/'); //определение констант
    define('MAIN_LAYOUT', 'main');

?>