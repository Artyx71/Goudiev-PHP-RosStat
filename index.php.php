<?php

$file = 'data.csv';

// Проверяем, существует ли файл
if (!file_exists($file)) {
    die('Файл не найден.');
}

// Читаем данные из файла CSV
$data = array();
if (($handle = fopen($file, "r")) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data[] = $row;
    }
    fclose($handle);
}

// Выводим данные в виде HTML-таблицы
echo '<table>';
foreach ($data as $row) {
    echo '<tr>';
    foreach ($row as $cell) {
        echo '<td>' . htmlspecialchars($cell) . '</td>';
    }
    echo '</tr>';
}
echo '</table>';

?>
