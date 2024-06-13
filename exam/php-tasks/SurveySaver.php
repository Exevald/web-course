<?php
declare(strict_types=1);

$text = $_GET['text'];
if (empty($text)) {
    exit('Empty input!');
}

$requiredFields = ['email'];
$email = $_GET['email'];
$inputPersonInfo = ['first_name', 'last_name', 'email', 'age'];
$outputPersonInfo = ['Имя', 'Фамилия', 'Email', 'Возраст'];
if (empty($email)) {
    exit('Empty email!');
}

$filePath = 'data/' . $email . '.txt';
if (file_exists($filePath)) {
    $file = fopen($filePath, 'rb+');
} else {
    $file = fopen($filePath, 'wb+');
}
rewind($file);
for ($i = 0, $iMax = count($inputPersonInfo); $i < $iMax; $i++) {
    if (!empty($_GET[$inputPersonInfo[$i]])) {
        fwrite($file, $outputPersonInfo[$i] . ': ' . $_GET[$inputPersonInfo[$i]] . PHP_EOL);
    } else {
        fgets($file, 4096);
    }
}

fclose($file);
echo('File created!');