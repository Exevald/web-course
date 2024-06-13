<?php
declare(strict_types=1);

$text = $_GET['text'];
if (empty($text)) {
    exit('Empty input!');
}

$text = preg_replace('/\s+/', ' ', $text);
$stringWithoutBlanks = trim($text);
echo('String without extra blanks: ' . $stringWithoutBlanks);