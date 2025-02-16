<?php
require_once "../db.php";

$pdo = connect();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["image"])) {
    $image = $_FILES["image"];
    $uploadDir = "../images/";
    $imagePath = $uploadDir . basename($image["name"]);

    // Проверка типа файла
    $allowedTypes = ["image/jpeg", "image/png", "image/gif"];
    if (!in_array($image["type"], $allowedTypes)) {
        die("Ошибка: Только изображения JPG, PNG и GIF!");
    }

    // Перемещение файла
    if (move_uploaded_file($image["tmp_name"], $imagePath)) {
        $stmt = $pdo->prepare("INSERT INTO Pictures (name, size, imagepath) VALUES (?, ?, ?)");
        $stmt->execute([$image["name"], $image["size"], $imagePath]);
        echo "Файл загружен!";
    } else {
        echo "Ошибка загрузки.";
    }
}
?>