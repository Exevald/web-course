<?php
declare(strict_types=1);

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

function addPersonInfoToFile($file, array $inputPersonInfo, array $outputPersonInfo): void
{
    # Необходимо дописать функцию заполнения файла информацией о пользователе
    # Стоит помнить, что не переданные параметры пользователя не обновляются в файле
}

addPersonInfoToFile($file, $inputPersonInfo, $outputPersonInfo);

fclose($file);
echo('File created!');