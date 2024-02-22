<?php

function maxCharOnLetter($letter)
{

    $max = count_chars($letter, 1);
    $index_char = (int)array_keys($max, max($max))[0];
    $char = chr($index_char);
    // print_r($max);

    return  "$char {$max[$index_char]}x".PHP_EOL;
}

echo maxCharOnLetter('wellcome');
echo maxCharOnLetter('strawberry');
echo maxCharOnLetter('andogantengsekali');
