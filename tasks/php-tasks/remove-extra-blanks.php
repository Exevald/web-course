<?php
declare(strict_types=1);

$text = $_GET['text'];
if (empty($text)) {
    exit('Empty input!');
}

# Необходимо написать функцию удаления лишних пробелов из строки
function removeExtraBlanks(string $text): string
{
    return "";
}

$stringWithoutBlanks = removeExtraBlanks($text);
echo('String without extra blanks: ' . $stringWithoutBlanks);