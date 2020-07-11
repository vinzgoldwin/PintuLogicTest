<?php

function countFactor($number)
{
    //start the execution time
    $time_start = microtime(true);

    $theNumber = 0;
    for ($i = 1; $i < $number; $i++) {
        $count = 0;
        for ($j = 1; $j <= $i; $j++) {
            if ($i % $j == 0) {
                $count++;
            }
            // optimize with break if the count is higher than 6
            if ($count > 6)
                break;
        }
        if ($count == 6) {
            $theNumber++;
        }
    }

    //end the execution time
    $time_end = microtime(true);

    //calculate the execution time
    $execution_time = ($time_end - $time_start);

    return array(
        'count' => $theNumber,
        'exec_time' => $execution_time
    );
}

$countNumber = countFactor(262144);

//$countNumber = countFactor(13421772);

echo "H(262144)=".
   $countNumber['count'].
    " with Execution time:".
    $countNumber['exec_time'];






