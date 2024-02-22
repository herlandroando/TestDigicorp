<?php

$store_user_tokens = [];

function generate($user, &$store_user_tokens)
{
    if (in_array($user, array_keys($store_user_tokens)) && count($store_user_tokens[$user]) >= 10) {
        echo "Maximum Token on $user." . PHP_EOL;
        return;
    }
    $token = generateRandomString();
    $store_user_tokens[$user][] = $token;
    echo "Token generated." . PHP_EOL;
    return $token;
}

function verify_token($user, $token, &$store_user_tokens)
{
    if (!in_array($user, array_keys($store_user_tokens))) {
        echo "$user not found!" . PHP_EOL;
        return;
    }

    $index = array_search($token, $store_user_tokens[$user]);

    if (is_bool($index)) {
        echo "Token tidak ditemukan";
        return false;
    }

    array_splice($store_user_tokens[$user], $index, 1);

    echo "Token ditemukan" . PHP_EOL;
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

$token = generate('Ando', $store_user_tokens);

print_r($store_user_tokens);
echo "Generate hingga 10" . PHP_EOL;

for ($i = 0; $i < 10; $i++) {
    generate('Ando', $store_user_tokens);
}
print_r($store_user_tokens);

echo "Verify token on Ando with token $token" . PHP_EOL;

verify_token('Ando', $token, $store_user_tokens);

print_r($store_user_tokens);
