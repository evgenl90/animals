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


<form>
<h1>Редактирование записи № <?php echo $animal['id']; ?></h1>
    <input type="hidden" name="id" value="<?php echo $animal['id']; ?>">
    <div class="mb-3">
        <label for="kind" class="form-label">Вид*</label>
        <input type="text" class="form-control" id="kind" name="kind" value="<?php echo htmlspecialchars($animal['kind']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="nickname" class="form-label">Кличка</label>
        <input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo htmlspecialchars($animal['nickname']); ?>">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Возраст (мес.)</label>
        <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($animal['age']);?>">
    </div>
    <div class="mb-3">
        <label for="notes" class="form-label">Описание</label>
        <textarea class="form-control" id="notes" name="notes" cols="30" rows="10" ><?php echo htmlspecialchars($animal['notes']);?></textarea>
    </div>
    <div class="edit-block-btn">
        <button type="button" class="btn btn-lg btn-primary" onclick="window.history.back()">Назад</button>
        <button type="button" class="btn btn-lg btn-success" id="editBtn">Сохранить</button>
    </div>
</form>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/blocks/footer.php'); ?>
<script>
    document.querySelector('#editBtn').onclick = function(){
        var data = new FormData(document.querySelector('form'));
        send('edit', data);
    }
</script>