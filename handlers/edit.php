<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');

if (!isset($_POST['kind']) || trim($_POST['kind']) === '') {
    echo json_encode(['error'=> "Заполните обязательные поля*"],true);
    die();
}
$id = $_POST['id'];
$kind = trim($_POST['kind']);
$nickname = trim($_POST['nickname']);
$age = trim($_POST['age']);
$notes = trim($_POST['notes']);

$db = new SQLite3('../animals.s3db');

$sql = "UPDATE animals SET kind = '{$db->escapeString($kind)}', nickname = '{$db->escapeString($nickname)}', age = '{$db->escapeString($age)}', notes = '{$db->escapeString($notes)}' WHERE id = '{$db->escapeString($id)}';";

if (!$db->query($sql)) {
    echo json_encode(['error'=> "Не удалось сохранить!"],true);
    $db->close();
    die();
}
$db->close();
echo json_encode(['success'=> 'Запись успешно сохранена!'],true);


