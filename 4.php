<?php
$rand_int_array = [];
for ($i = 0; $i < 5; $i++) {
    $rand_int_array[] = rand(1, 100);
}

print_r($rand_int_array);

function getSecondGreatest($arr)
{
    $new_arr = $arr;
    rsort($new_arr);
    $new_arr=array_values($new_arr);
    return $new_arr[1];
}

echo getSecondGreatest($rand_int_array) . PHP_EOL;
