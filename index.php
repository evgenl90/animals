<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/blocks/header.php'); ?>

            <h1 style="margin-bottom: 50px;">Список поступивших животных</h1>
            
            <table class="table">
                <thead>
                    <tr>
                    
                    <th scope="col">Вид</th>
                    <th scope="col">Кличка</th>
                    <th scope="col">Возраст</th>
                    <th scope="col">Дата поступления</th>
                    <th scope="col">Описание</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach(get_animals_all() as $item){  ?>  
                        <tr onclick="window.location = 'animal.php?id=<?php echo htmlspecialchars($item['id']);?>';" class="animal-row">
                            <td><?php echo htmlspecialchars($item['kind']); ?></td>
                            <td><?php echo htmlspecialchars($item['nickname']); ?></td>
                            <td><?php echo htmlspecialchars($item['age']); ?></td>
                            <td><?php echo htmlspecialchars(date('Y-m-d H:i:s',$item['date'])); ?></td>
                            <td><?php echo htmlspecialchars($item['notes']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
                
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/blocks/footer.php'); ?>
