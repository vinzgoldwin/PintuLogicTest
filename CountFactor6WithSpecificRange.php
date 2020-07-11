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
            // optimize with no need to operate the selected number
            // if the count is higher than 6 already
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

echo "H(262144)=".
    countFactor(262144)['count'].
    " with Execution time:".
    countFactor(262144)['exec_time'];

echo "H(134217728)".
    countFactor(134217728)['count'].
    "with Execution time:".
    countFactor(134217728)['exec_time'];





