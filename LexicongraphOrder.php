<?php

function removeDuplicateWithSmallestLexicographicalOrder($string)
{
    $chars = 0;
    $after = [];

    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $ch = ord($string[$i]) - 97;
        $chars = $chars | (1 << $ch);
        $after[$i] = $chars;
    }

    $result = "";
    $start = 0;
    $pos = 0;

    while ($chars) {
        for ($i = 0; $i <26; $i++) {
            if($chars & (1 << $i)) {
                $pos = strpos($string, chr(97 + $i), $start);
                if ($chars == ($chars & $after[$pos])) {
                    $result = $result . chr(97 + $i);
                    $chars = $chars - (1 << $i);
                    break;
                }
            }
        }
        $start = $pos + 1;
    }
    return $result;
}
// Downloaded data is from this link : https://gist.github.com/Jekiwijaya/0b85de3b9ff551a879896dd78256e9b8#file-gistfile1-txt
// and change the name to string.txt
$fopen = fopen('string.txt', 'r');

$fread = fread($fopen, filesize('string.txt'));

print_r(removeDuplicateWithSmallestLexicographicalOrder($fread));