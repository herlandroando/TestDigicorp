<?php

const LAMPU_LALU_LINTAS = ['merah', 'kuning', 'hijau'];

$index_lamp = 0;

function changeLamp(&$index_lamp)
{
    $index_lamp++;
    if ($index_lamp >= count(LAMPU_LALU_LINTAS) + 1) {
        $index_lamp = 1;
    }

    return LAMPU_LALU_LINTAS[$index_lamp - 1];
}

for ($i = 0; $i < 5; $i++) {
    echo 'Lampu Lalu Lintas : ' . changeLamp($index_lamp) . PHP_EOL;
}
