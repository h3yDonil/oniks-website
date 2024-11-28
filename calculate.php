<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prices = $_POST['prices'];
    $percentage = $_POST['percentage'];

    if (count($prices) !== 10) {
        echo "Пожалуйста, введите 10 цен.";
        exit;
    }

    echo "<h1>Результаты расчета</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Цена</th><th>Процент</th><th>Итог</th></tr>";

    foreach ($prices as $price) {
        $result = $price * ($percentage / 100);
        echo "<tr><td>" . htmlspecialchars($price) . "</td><td>" . htmlspecialchars($percentage) . "%</td><td>" . htmlspecialchars($result) . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "Некорректный запрос.";
}


