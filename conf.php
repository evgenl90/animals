<?php 
define('DB', $_SERVER['DOCUMENT_ROOT'] . '/animals.s3db');


if(!file_exists(DB)){
    echo "Нет подключения к базе данных!";
    exit();
}
