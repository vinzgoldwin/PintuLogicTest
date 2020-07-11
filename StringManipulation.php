<?php

function removeDuplicatesFromString($str)
{

    // keeps track of visited characters
    $counter = 0;

    $i = 0;

    $size = strlen($str);

    // gets character value
    $x = 0;

    // keeps track of length of resultant string
    $length = 0;

    while ($i < $size)
    {
        //change the value of letter to ASCII VALUE and subtract it by 97 to make it fit in 32 bits
        $x = ord($str[$i]) - 97;

        // check if Xth bit of counter is unset
        if (($counter & (1 << $x)) == 0)
        {
            $str[$length] = chr(97 + $x);

            // mark current character as visited
            $counter = $counter | (1 << $x);

            $length++;
        }
        $i++;
    }

    return substr($str, 0, $length);
} ;

// Downloaded data is from this link : https://gist.github.com/Jekiwijaya/0b85de3b9ff551a879896dd78256e9b8#file-gistfile1-txt
// and change the name to string.txt
$fopen = fopen('string.txt', 'r');

$fread = fread($fopen, filesize('string.txt'));

echo removeDuplicatesFromString($fread);

