<?php

class Validator
{
    public static function validate($name, $size)
    {
        $res = preg_match('/^.+\\.csv$/', $name); //проверка расширения файла, посредством решулярных выражений

        if ($res && $size <= 1000) { //проверка расширения и размера файла
            return true;
        } elseif (!$res) {
            Session::set('message_error', 'Wrong file extension!');
            return false;
        } elseif ($size > 1000) {
            Session::set('message_error', 'To heavy file! (>1Mb)');
            return false;
        } else {
            Session::set('message_error', 'Some error');
            return false;
        }
    }
}