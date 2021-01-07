<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$length = (int)fgets($_fp);
$numbers = explode(' ', fgets($_fp));

/**
 * @param array $numbers
 * @param int $length 
 */
function mean(array $numbers, int $length)
{
    return array_sum($numbers) / $length;
}

/**
 * @param array $numbers
 * @param int $length 
 */
function median(array $numbers, int $length)
{
    sort($numbers);
    if (($length % 2) == 0) {
        return mean([
            (int)$numbers[($length / 2)],
            (int)$numbers[($length / 2) - 1]
        ], 2);
    }
    return (int)$numbers[floor(($length / 2))];
}

/**
 * @param array $numbers
 * @param int $length 
 */
function quartile(array $numbers, int $length, int $offset)
{
    sort($numbers);
    $numbers = array_slice($numbers, $offset, ($length - 1));
    if (($length % 2) == 0) {
        return mean([
            (int)$numbers[($length / 2)],
            (int)$numbers[($length / 2) - 1]
        ], 2);
    }
    return (int)$numbers[floor(($length / 2))];
}

print(quartile($numbers, floor(($length / 2)), 0) . " \n");
print(median($numbers, $length) . " \n");
print(quartile($numbers, floor(($length / 2)), ceil(($length / 2))));
