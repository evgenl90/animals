<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');

if (!isset($_POST['id']) || trim($_POST['id']) === '') {
    echo json_encode(['error'=> "Идентификатор не передан!"],true);
    die();
}
$id = $_POST['id'];

$db = new SQLite3('../animals.s3db');

$sql = "DELETE FROM animals WHERE id = '{$db->escapeString($id)}';";

if (!$db->query($sql)) {
    echo json_encode(['error'=> "Не удалось удалить запись!"],true);
    $db->close();
    die();
}
$db->close();
echo json_encode(['success'=> 'Запись успешно удалена!'],true);




