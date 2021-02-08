<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');

if (!isset($_POST['kind']) || trim($_POST['kind']) === '') {
    echo json_encode(['error'=> "Введите вид животного!"],true);
    die();
}

$kind = trim(htmlspecialchars($_POST['kind']));
$nickname = $_POST['nickname'];
$age = $_POST['age'];
$notes = $_POST['notes'];
$date = time();

$db = new SQLite3('../animals.s3db');

$sql = "INSERT INTO animals (`kind`, `nickname`, `age`, `notes`, `date`) VALUES ('{$db->escapeString($kind)}', '{$db->escapeString($nickname)}', '{$db->escapeString($age)}', '{$db->escapeString($notes)}', '{$db->escapeString($date)}');";


if (!$db->query($sql)) {
    echo json_encode(['error'=> "Не удалось добавить!"],true);
    $db->close();
    die();
}
$db->close();
echo json_encode(['success'=> 'Животное успешно добавлено!'],true);


