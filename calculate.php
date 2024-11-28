<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prices = explode(',', $_POST['prices']);
    $results = [];
    $total = 0;
    foreach ($prices as $price) {
        $price = trim($price); // Убираем пробелы
        $percentage = 0;

        if ($price >= 150000 && $price <= 199999) {
            $percentage = 0.008;  // +0.8%
        } elseif ($price >= 100000 && $price <= 149999) {
            $percentage = 0.0085;  // +0.85%
        } elseif ($price >= 50000 && $price <= 99999) {
            $percentage = 0.009;  // +0.9%
        } elseif ($price >= 20000 && $price <= 49999) {
            $percentage = 0.01;  // +1%
        } elseif ($price >= 10000 && $price <= 19999) {
            $percentage = 0.012;  // +1.2%
        } elseif ($price >= 5000 && $price <= 9999) {
            $percentage = 0.02;  // +2%
        } elseif ($price >= 2000 && $price <= 4999) {
            $percentage = 0.03;  // +3%
        } elseif ($price >= 1000 && $price <= 1999) {
            $percentage = 0.05;  // +5%
        } elseif ($price >= 500 && $price <= 999) {
            $percentage = 0.06;  // +6%
        } elseif ($price >= 0 && $price <= 499) {
            $percentage = 0.07;  // +7%
        }

        $increase = $price * $percentage;
        $total += $increase;
        $results[] = "Бонус от суммы: {$price} = " . number_format($increase, 2);
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты расчета</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    </style>
</head>
<body>
<h1>Результаты расчета</h1>
<ul>
    <?php
    if (isset($results) && count($results) > 0) {
        foreach ($results as $result) {
            echo "<li>$result</li>";
        }
        echo "<li><strong>Общая сумма бонусов: " . number_format($total, 2) . "</strong></li>";
    } else {
        echo "<li>Нет данных для отображения.</li>";
    }
    ?>
</ul>
<a href="index.html">Вернуться назад</a>
</body>
</html>
