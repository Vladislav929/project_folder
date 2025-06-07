<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Удаляем пустые поля
    $data = array_filter($_POST);
    
    // Подготавливаем SQL запрос
    $columns = implode(', ', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));
    
    $sql = "INSERT INTO shop ($columns) VALUES ($values)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        
        // Перенаправляем обратно на главную страницу
        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        die("Ошибка при добавлении записи: " . $e->getMessage());
    }
}
?>