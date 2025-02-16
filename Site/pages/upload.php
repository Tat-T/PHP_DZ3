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

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка изображения</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-info-subtle">
<div class="container mt-5">
    <h2 class="text-info">Загрузка изображения</h2>
    <form  method="POST" class="container col-6 rounded p-3 mt-3 position-absolute top-50 start-50 translate-middle" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-primary">Загрузить</button>
            <a href="../index.php" class="btn btn-secondary mt-3">На главную</a>
        </div>
    </form>
</div>
</body>
</html>