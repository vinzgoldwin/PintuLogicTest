<?php

function removeDuplicateWithSmallestLexicographicalOrder($string)
{
    $chars = 0;
    $after = [];

    // check all the letter from the input and convert it into binary
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $ch = ord($string[$i]) - 97;
        $chars = $chars | (1 << $ch);
        $after[$i] = $chars;
    }

    // initialize the first result with blank string
    $result = "";

    // variable helper
    $start = 0;
    $pos = 0;

    // check from the string input the best possible Lexicograph Order
    // best case : find the first letter 'a' and has all other letter from input
    // if itsn't possible : find letter 'b' and all other letter from input (even 'a' if there is 'a' in input)
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