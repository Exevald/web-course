<?php
declare(strict_types=1);

# Функция подсчёта количества символов и цифр у пароля. Необходимо разобраться, как она работает
function countPasswordSymbolsAndDigits(
    string $text,
    int    &$digitsCount,
    int    &$lettersCount,
    int    &$uppercaseSymbolsCount,
    int    &$lowercaseSymbolsCount,
    int    &$repeatedSymbolsCount,
): void
{
    foreach (str_split($text) as $char) {
        if (ctype_digit($char)) {
            $digitsCount++;
        } else {
            $lettersCount++;
            if (ctype_upper($char)) {
                $uppercaseSymbolsCount++;
            } else {
                $lowercaseSymbolsCount++;
            }
        }
        if (isset($allSymbols[$char])) {
            $repeatedSymbolsCount += 2;
        } else {
            $allSymbols[$char] = true;
        }
    }
}

function checkPasswordStrength(
    int $passwordLength,
    int $digitsCount,
    int $uppercaseSymbolsCount,
    int $lowercaseSymbolsCount,
    int $lettersCount,
    int $repeatedSymbolsCount
): int
{
    # Тут необходимо посчитать финальное значение безопасности пароля, основываясь на данных, полученных в параметрах функции

    return 0;
}

# Получение пароля через GET-запрос
$text = $_GET['text'];
if (empty($text)) {
    exit('Empty input!');
}

# Тут необходимо добавить проверки на наличие лишних символов в строке
# Пароль должен состоять только из английских символов в верхнем и нижнем регистрах, а также из цифр

$passwordLength = strlen($text);

$allSymbols = array();
$digitsCount = 0;
$lettersCount = 0;
$uppercaseSymbolsCount = 0;
$lowercaseSymbolsCount = 0;
$repeatedSymbolsCount = 0;

countPasswordSymbolsAndDigits(
    $text,
    $digitsCount,
    $lettersCount,
    $uppercaseSymbolsCount,
    $lowercaseSymbolsCount,
    $repeatedSymbolsCount
);

$passwordStrength = checkPasswordStrength(
    $passwordLength,
    $digitsCount,
    $lettersCount,
    $uppercaseSymbolsCount,
    $lowercaseSymbolsCount,
    $repeatedSymbolsCount
);

echo('Strength of your password = ' . $passwordStrength);