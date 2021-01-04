<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$length = (int)fgets($_fp);
$numbers = explode(' ', fgets($_fp));
$weight = explode(' ', fgets($_fp));


/**
 * @param array $numbers
 * @param array $weight
 */
function weightedMean(array $numbers, array $weight)
{
    $sum = 0;
    foreach ($numbers as $key => $value) {
        $sum += $value * $weight[$key];
    }

    return $sum / array_sum($weight);
}

/**
 * @param string $string
 * @return string
 */
function format($string): string
{
    return number_format($string, 1, '.', '');
}


print(format(weightedMean($numbers, $weight)));
