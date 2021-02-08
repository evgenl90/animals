<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
if(!isset($_GET['id']) || $_GET['id'] === '') {
    require_once ($_SERVER['DOCUMENT_ROOT'].'/page404.html');
    die();
}
$id = $_GET['id'];
$animal = get_animal_id($id);

?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/blocks/header.php'); ?>

    <div class="bg-light p-5 rounded">
        <div class="report">
            <h1>Отчет по животному</h1>
            <p class="lead"><span>Вид: </span> <?php echo htmlspecialchars($animal['kind']); ?></p>
            <p class="lead"><span>Кличка: </span><?php echo htmlspecialchars($animal['nickname']); ?></p>
            <p class="lead"><span>Возраст(мес.): </span><?php echo htmlspecialchars($animal['age']); ?></p>
            <p class="lead"><span>Дата поступления: </span><?php echo htmlspecialchars(date('Y-m-d H:i:s',$animal['date'])); ?></p>
            <p class="lead"><span>Описание: </span><?php echo htmlspecialchars($animal['notes']); ?></p>
        </div>
        <form style="margin-top: 50px;">
            <button type="button" class="btn btn-lg btn-primary" onclick="window.history.back()">Назад</button>
            <button class="btn btn-lg btn-success" id="printBtn">Печать</button>
            <a href="/edit.php?id=<?php echo htmlspecialchars($animal['id']); ?>" class="btn btn-lg btn-primary">Редактировать</a>
        
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($animal['id']); ?>">
            <button id="deleteBtn" type="button" class="btn btn-lg btn-danger">Удалить</button>
        </form>
    </div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/blocks/footer.php'); ?>

<script>
    document.querySelector('#deleteBtn').onclick = function(){
        var data = new FormData(document.querySelector('form'));
        send('delete', data);
    }
    document.querySelector('#printBtn').onclick = function(){
        printPage('.report');
    }
</script>