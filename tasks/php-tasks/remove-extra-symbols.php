<?php
declare(strict_types=1);

$text = $_GET['text'];
if (empty($text)) {
    exit('Empty input!');
}

# Необходимо написать функцию удаления лишних символов из строки
function removeExtraSymbols(string $text): string
{
    return "";
}

$stringWithoutExtraSymbols = removeExtraSymbols($text);
echo('String without extra symbols: ' . $stringWithoutExtraSymbols);