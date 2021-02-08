<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        
        <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm mb-5">
            <p class="h5 my-0 me-md-auto fw-normal">
                <a href="/" class="p-2 text-dark">Приют животных</a>
            </p> 
            <nav class="my-2 my-md-0 me-md-3">
                <a class="p-2 text-dark" href="/">Главная</a>
                <a class="btn btn-lg btn-primary" href="/create.php">Добавить</a>
                <a class="btn btn-lg btn-success" href="/handlers/excel.php">Загрузить из excel</a>
            </nav>
        </header>
        <div class="container">
        
    