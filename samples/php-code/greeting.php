<?php
declare(strict_types=1);

# Получаем данные из GET-запроса
$firstName = $_GET['first_name'];
$lastName = $_GET['last_name'];
if (empty($firstName) || empty($lastName)) {
    exit('Empty input!');
}

# Выводим данные на сайт
echo ("Hello $firstName $lastName!");