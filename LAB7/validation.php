<?php
    function ValidateField($Field): bool {
        if (isset($Field) && strlen($Field) > 0){
            return true;
        } else {
            return false;
        }
    }

    function ValidateDate($dateTime, $format = 'd.m.y'): bool {
            // Создаем объект DateTime из строки
            $dateTimeObject = DateTime::createFromFormat($format, $dateTime);
            // Проверяем, корректно ли создан объект
            if ($dateTimeObject && $dateTimeObject->format($format) === $dateTime) {
                return true; // Дата и время корректны
            } else {
                return false; // Дата и время некорректны
            }       
    }

    function ValidateType($Check1, $Check2): bool {
        if (gettype($Check1) == gettype($Check2)){
            return true;
        } else {
            return false;
        }
    }
?>