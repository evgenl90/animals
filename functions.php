<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');

function get_animals_all(){
    $db = new SQLite3(DB);
    $sql = "SELECT * FROM animals";
    $result = $db->query($sql);
    $animals = [];
    while($row = $result->fetchArray()){
        $animals[$row['id']] = $row;
    }
    $db->close();
    return $animals;
}

function get_animal_id($id){
    $db = new SQLite3(DB);
    $sql = "SELECT * FROM animals WHERE id = " .$db->escapeString($id);
    $result = $db->query($sql);
    $animal = $result->fetchArray();
    $db->close();
    return $animal;
}



