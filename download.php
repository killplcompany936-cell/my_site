<?php
// download.php - Скрипт для безопасной загрузки файлов

$filename = 'Counter Kill PL.zip';

$filepath = 'downloads/' . $filename;

if (file_exists($filepath)) {
    // Устанавливаем заголовки для скачивания
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    
    flush();
    
    readfile($filepath);
    exit;
} else {
    http_response_code(404);
    echo "Файл не найден!";
}
?>