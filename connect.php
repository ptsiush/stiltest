<?php

$connect = mysqli_connect('localhost', 'root', '1', 'stiltest');

if (!$connect){
    die('Отсутствует подключение к БД');
}

?>