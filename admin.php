<?php
session_start();

// Проверка аутентификации сотрудника
if (!isset($_SESSION["admin"])) {
    header('Location: login.php'); // Перенаправление на страницу входа
    exit;
}

// Подключение к базе данных
$db = new mysqli("hostname", "username", "password", "database_name");

// Проверка соединения с базой данных
if ($db->connect_error) {
    die("Ошибка подключения к базе данных: " . $db->connect_error);
}

// Запрос на получение заявок
$query = "SELECT * FROM support_requests";
$result = $db->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Вывод информации о заявке (можете стилизовать как вам нужно)
        echo "Имя: " . $row["name"] . "<br>";
        echo "Телефон: " . $row["phone"] . "<br>";
        echo "Сообщение: " . $row["message"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Нет заявок.";
}

$db->close();
?>
