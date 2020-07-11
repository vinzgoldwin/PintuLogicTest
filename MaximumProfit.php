<?php

function profit($arr, $arrSize)
{
    // initialize the first profit
    $profit = $arr[1] - $arr[0];

    // initialize the first minimum buying
    $minBuying = $arr[0];

    for($i = 1; $i < $arrSize; $i++)
    {
        // if the value of (current data - minimum buying) is higher than current profit, that value is the newest profit
        if ($arr[$i] - $minBuying > $profit) {
            $profit = $arr[$i] - $minBuying;
            $max = $arr[$i];
            $min = $minBuying;
        }

        // check if current data value is lower than current minimum buying, if it is true,
        if ($arr[$i] < $minBuying)
            $minBuying = $arr[$i];
    }

    // if the calculation of profit is negative value, just give it zero value
    if ($profit < 0) {
        $profit = 0;
        $max = "-";
        $min = "-";
    }

    return array(
        'profit'    => $profit,
        'minBuying' => $min,
        'maxBuying' => $max
    );
}

// Downloaded data is from this link : https://gist.githubusercontent.com/Jekiwijaya/c72c2de532203965bf818e5a4e5e43e3/raw/2631344d08b044a4b833caeab8a42486b87cc19a/gistfile1.txt
// and change the name to data.txt
$fopen = fopen('data.txt', 'r');

$fread = fread($fopen, filesize('data.txt'));

//make the data to array using space(' ') as delimiter
$data = explode(' ', $fread);
$arraySize = sizeof($data);

// Function calling
echo 'Highest profit is '.
    profit($data, $arraySize)['profit'].
    ', Min Buy is ' .
    profit($data, $arraySize)['minBuying'].
    ', Max Buy is '.
    profit($data, $arraySize)['maxBuying'];