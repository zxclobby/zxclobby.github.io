<?php
session_start();

// Подключение к базе данных
$db = new mysqli("hostname", "username", "password", "database_name");

// Проверка соединения с базой данных
if ($db->connect_error) {
    die("Ошибка подключения к базе данных: " . $db->connect_error);
}

// Проверка, что форма была отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Вставка данных в базу данных
    $query = "INSERT INTO support_requests (name, phone, message) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("sss", $name, $phone, $message);
    if ($stmt->execute()) {
        echo 'Заявка успешно отправлена';
    } else {
        echo 'Произошла ошибка: ' . $stmt->error;
    }

    $stmt->close();
} else {
    // Если форма не была отправлена, перенаправьте пользователя на страницу с формой
    header('Location: support_form.html');
    exit;
}

$db->close();
?>
