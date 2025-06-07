<?php
require 'db_connect.php';

// Получаем данные из таблицы (замените 'your_table' на имя вашей таблицы)
$stmt = $pdo->query('SELECT * FROM shop');
$rows = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр базы данных</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Таблица данных</h1>
        
        <table>
            <thead>
                <tr>
                    <?php if(!empty($rows)): ?>
                        <?php foreach($rows[0] as $key => $value): ?>
                            <th><?= htmlspecialchars($key) ?></th>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <?php foreach($row as $value): ?>
                            <td><?= htmlspecialchars($value) ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <h2>Добавить новую запись</h2>
        <form action="add.php" method="post">
            <?php if(!empty($rows)): ?>
                <?php foreach($rows[0] as $key => $value): ?>
                    <?php if($key != 'id'): // Пропускаем поле ID ?>
                        <div class="form-group">
                            <label for="<?= $key ?>"><?= $key ?>:</label>
                            <input type="text" id="<?= $key ?>" name="<?= $key ?>" required>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <button type="submit">Добавить</button>
        </form>
    </div>
</body>
</html>