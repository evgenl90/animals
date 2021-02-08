<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');

function parse_excel_file( $filename ){
	// путь к библиотеки от корня сайта
	require_once $_SERVER['DOCUMENT_ROOT'].'/PHPExcel/Classes/PHPExcel.php';
	$result = array();
	// получаем тип файла (xls, xlsx), чтобы правильно его обработать
	$file_type = PHPExcel_IOFactory::identify( $filename );
	// создаем объект для чтения
	$objReader = PHPExcel_IOFactory::createReader( $file_type );
	$objPHPExcel = $objReader->load( $filename ); // загружаем данные файла
	$result = $objPHPExcel->getActiveSheet()->toArray(); // выгружаем данные

	return $result;
}
$res = parse_excel_file($_SERVER['DOCUMENT_ROOT'].'/animals.xlsx' );
print_r( $res );

if (!$res) {
    echo json_encode(['error'=> "Файл пуст!"],true);
    die();
}

$date = time();
$db = new SQLite3('../animals.s3db');

for($i = 1; $i <= count($res)-1; $i++){
    $sql = "INSERT INTO animals (`kind`, `nickname`, `age`, `notes`, `date`) VALUES ('{$db->escapeString($res[$i][0])}', '{$db->escapeString($res[$i][1])}', '{$db->escapeString($res[$i][2])}', '{$db->escapeString($res[$i][3])}', '{$db->escapeString($date)}');";
	if (!$db->query($sql)) {
		$db->close();
		$_SESSION['res'] = 'Не загрузить данные!';
		header("Location: /");
		exit();	
	}

}


$db->close();
$_SESSION['res'] = 'Данные успешно загружены!';
header("Location: /");
exit();