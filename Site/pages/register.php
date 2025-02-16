<?php
require_once "../db.php"; // Подключение к базе
// Обработчик формы регистрации
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pdo = connect($host, $user, $password, $dbname);
    
    $login = $_POST["login"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST["email"];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO Users (login, password, email) VALUES (?, ?, ?)");
        $stmt->execute([$login, $password, $email]);
        echo "Регистрация успешна!";
    } catch (PDOException $e) {
        echo "Ошибка регистрации: " . $e->getMessage();
    }
}
?>