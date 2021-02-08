<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/blocks/header.php'); ?>


        <form>
        <h1>Создание записи</h1>
            <div class="mb-3">
                <label for="kind" class="form-label">Вид*</label>
                <input type="text" class="form-control" id="kind" name="kind" required>
            </div>
            <div class="mb-3">
                <label for="nickname" class="form-label">Кличка</label>
                <input type="text" class="form-control" id="nickname" name="nickname">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Возраст (мес.)</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Описание</label>
                <textarea class="form-control" id="notes" name="notes" cols="30" rows="10"></textarea>
            </div>
            <div class="edit-block-btn">
                <button type="button" class="btn btn-lg btn-primary" onclick="window.history.back()">Назад</button>
                <button type="button" class="btn btn-lg btn-success" id="createBtn">Создать</button>
            </div>
        </form>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/blocks/footer.php'); ?>
<script>
    document.querySelector('#createBtn').onclick = function(){
        var data = new FormData(document.querySelector('form'));
        send('create', data);
    }
</script>