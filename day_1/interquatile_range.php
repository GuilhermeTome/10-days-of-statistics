<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$length = (int)fgets($_fp);
$numbers = explode(' ', fgets($_fp));
$weight = explode(' ', fgets($_fp));

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

/**
 * @param string $string
 * @return string
 */
function format($string): string
{
    return number_format($string, 1, '.', '');
}

function weight(array $numbers, array $weight)
{
    $newNumbers = [];

    foreach ($numbers as $key => $value) {
        for ($i = 1; $i <= $weight[$key]; $i++) {
            $newNumbers[] = (int)$value;
        }
    }

    return $newNumbers;
}

/**
 * @param array $numbers
 * @param int $length 
 */
function interquartileRange(array $numbers, int $length)
{
    sort($numbers);

    $q1 = quartile($numbers, floor(($length / 2)), 0);
    $q3 = quartile($numbers, floor(($length / 2)), ceil(($length / 2)));

    return $q3 - $q1;
}

print(format(interquartileRange(weight($numbers, $weight), (array_sum($weight)))));
