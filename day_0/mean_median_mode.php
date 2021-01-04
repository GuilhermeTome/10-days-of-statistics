<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$length = (int)fgets($_fp);
$numbers = explode(' ', fgets($_fp));

/**
 * @param array $numbers
 * @param int $length 
 */
function mean(array $numbers, int $length) {
    return array_sum($numbers) / $length;
}

/**
 * @param array $numbers
 * @param int $length 
 */
function median(array $numbers, int $length) {
    sort($numbers);
    if (($length % 2) == 0) {
        return mean([
            (int)$numbers[($length/2)],
            (int)$numbers[($length/2)-1]
        ], 2);
    }
    return (int)$numbers[floor(($length/2))];

}

/**
 * @param array $numbers
 */
function mode(array $numbers) {
    sort($numbers);
    $repeat = array_count_values($numbers);
    $max = max($repeat);
    foreach ($repeat as $number => $value) {
        if ($value == $max) {
            return $number;
        }
    }
}

/**
 * @param string $string
 * @return string
 */
function format($string): string  {
    return number_format($string, 1, '.', '');
}


print(format(mean($numbers, $length)). " \n");
print(format(median($numbers, $length)). " \n");
print(mode($numbers));
