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
function standartDeviation(array $numbers, int $length)
{
    sort($numbers);
    $mean = mean($numbers, $length);

    $sum = 0;
    foreach ($numbers as $key => $value) {
        $sum += (($value - $mean) ** 2);
    }

    return sqrt($sum / count($numbers));
}

/**
 * @param string $string
 * @return string
 */
function format($string): string
{
    return number_format($string, 1, '.', '');
}


print(format(standartDeviation($numbers, $length)));
