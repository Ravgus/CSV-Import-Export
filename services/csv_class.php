<?php

class CSV
{
    public static function read($name, $length, $delimiter) //чтение CSV-файлов
    {
        $dataset = [];
        $file = fopen($name, 'rt');

        for($i=0; $data = fgetcsv($file, $length, $delimiter); $i++){

            if($i == 0) {
                if (count(array_intersect_assoc($data, ['UID', 'Name', 'Age', 'Email', 'Phone', 'Gender'])) == 6) //проверка корректности структуры CSV файла
                    continue; //пропуск шапки таблицы
                else {
                    Session::set('message_error', 'Not correct date format');
                    return false;
                }
            }

            $pole = count($data);

            for ($c=0; $c < $pole; $c++){
                $dataset[$i][] = $data[$c];
            }
        }

        fclose($file);

        return $dataset;
    }

    public static function write($data) //генерация CSV-файлов
    {
        $file = fopen('output/results.csv', 'w');

        fputcsv($file, array('UID', 'Name', 'Age', 'Email', 'Phone', 'Gender'));

        foreach ($data as $row)
        {
            fputcsv($file, $row, ',', chr(0));
        }
    }
}
