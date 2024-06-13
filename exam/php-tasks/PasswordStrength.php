<?php
declare(strict_types=1);

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

function countPasswordSecurity(
    int $passwordLength,
    int $digitsCount,
    int $uppercaseSymbolsCount,
    int $lowercaseSymbolsCount,
    int $lettersCount,
    int $repeatedSymbolsCount
): int
{
    $security = 4 * $passwordLength;
    $security += 4 * $digitsCount;
    if ($uppercaseSymbolsCount > 0) {
        $security += 2 * ($passwordLength - $uppercaseSymbolsCount);
    }
    if ($lowercaseSymbolsCount > 0) {
        $security += 2 * ($passwordLength - $lowercaseSymbolsCount);
    }
    if ($lettersCount === $passwordLength) {
        $security -= $passwordLength;
    }
    if ($digitsCount === $passwordLength) {
        $security -= $passwordLength;
    }
    $security -= $repeatedSymbolsCount;

    return $security;
}

$text = $_GET['text'];
if (empty($text)) {
    exit('Empty input!');
}

preg_match('/^[a-zA-Z0-9]+/', $text, $matches);
$passwordLength = strlen($matches[0]);
$different = strlen($text) - $passwordLength;

if ($different > 0) {
    exit('Error - char in ' . $passwordLength . ' position not english bet or digit');
}

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

$passwordSecurity = countPasswordSecurity(
    $passwordLength,
    $digitsCount,
    $lettersCount,
    $uppercaseSymbolsCount,
    $lowercaseSymbolsCount,
    $repeatedSymbolsCount
);

echo('Security of your password = ' . $passwordSecurity);