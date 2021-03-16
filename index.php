//-----------------------------------------------------
<?php
$ar = [6, 5, 2, 3, 5, 2, 2, 1, 1, 5, 1, 3, 3, 3, 5];
$count = 0;
$arr_count_values = array_count_values($ar);
foreach ($arr_count_values as $item) {
    $count += floor($item / 2);
}
return $count;
//-----------------------------------------------------

$steps = 10;
$path = str_split('DUDDDUUDUU');
function countingValleys($steps, $path)
{
    $points = array();
    $valleys = 0;
    for ($i = 0; $i < $steps; $i++) {
        if ($path[$i] == 'U') {
            array_push($points, 1);
        } else if ($path[$i] == 'D') {
            array_push($points, -1);
        }
        if (array_sum($points) == 0 && $i >= 1) {
            if ($points[$i] != -1) {
                $valleys++;
            }
        }
    }
    return  $valleys;
}

echo countingValleys($steps, $path);
//-----------------------------------------------------
function jumpingOnClouds($c)
{
    $jump_counts = 0;
    for ($i = 0; $i < count($c) - 1; $i++) {
        if (isset($c[$i + 1])) {
            if (isset($c[$i + 2]) && $c[$i + 2] == 0) {
                $i += 1;
                $jump_counts++;
            } elseif ($c[$i + 1] == 0) {
                $jump_counts++;
            }
        }
    }
    return $jump_counts;
}
//-----------------------------------------------------
function repeatedString($s, $n)
{
    $sum_of_a = substr_count($s, 'a');
    $string_length = count(str_split($s));
    $number_of_char = intval($n / $string_length);
    $tt = 0;
    if ($n < $string_length) {
        $tt = substr_count($s, 'a', 0, $n);
    }
    $result = $n - ($number_of_char * $string_length);
    $t = 0;
    if ($tt) {
        $t = $tt;
    } else {
        $r = substr_count(substr($s, 0, $result), 'a');
        $t = $number_of_char * $sum_of_a + $r;
    }
    return $t;
}
//-----------------------------------------------------

$arr = array(
    array(-1, -1, 0, -9, -2, -2),
    array(-2, -1, -6, -8, -2, -5),
    array(-1, -1, -1, -2, -3, -4),
    array(-1, -9, -2, -4, -4, -5),
    array(-7, -3, -3, -2, -9, -9),
    array(-1, -3, -1, -2, -4, -5)
);

function hourglassSum($arr)
{
    $sum = array();
    for ($j = 0; $j < count($arr); $j++) {
        for ($i = 0; $i < count($arr); $i++) {
            if (isset($arr[$j][$i + 2]) && isset($arr[$j + 2][$i])) {
                array_push($sum, ($arr[$j][$i]) + ($arr[$j][$i + 1]) + ($arr[$j][$i + 2])
                    + ($arr[$j + 1][$i + 1])
                    + ($arr[$j + 2][$i]) + ($arr[$j + 2][$i + 1]) + ($arr[$j + 2][$i + 2]));
            }
        }
    }
    return max($sum);
}
//-----------------------------------------------------
$arr = array(4, 2, 3, 1);
function countSwaps($arr)
{
    $count = 0;
    $size = sizeof($arr) - 1;
    for ($i = $size; $i >= 0; $i--) {
        for ($j = 0; $j <= ($i - 1); $j++)
            if ($arr[$j] > $arr[$j + 1]) {
                $k = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $k;
                $count++;
            }
    }
    echo "Array is sorted in $count swaps." . PHP_EOL;
    echo "First Element: $arr[0]" . PHP_EOL;
    echo "Last Element: " . end($arr) . PHP_EOL;
}
countSwaps($arr, $count);

//-----------------------------------------------------
$string = array('aba', 'baba', 'aba', 'xzxb');
$queries = array('aba', 'xzxb', 'ab');

function matchingStrings($string, $queries)
{
    $count = 0;
    $ret = array();
    for ($i = 0; $i < count($queries); $i++) {
        for ($j = 0; $j < count($string); $j++) {
            if ($queries[$i] == $string[$j]) {
                $count++;
            }
        }
        array_push($ret, $count);
        $count = 0;
    }
    return $ret;
}
matchingStrings($string, $queries);

//-----------------------------------------------------
$d = 4;
$a = array(1, 2, 3, 4, 5);

function rotLeft($a, $d)
{
    $temp_arr = $a;
    $new_array = array();
    $new_array = array_merge(array_splice($temp_arr, $d), array_splice($a, 0, $d));
    return $new_array;
}

rotLeft($a, $d);

//-----------------------------------------------------
$q = array(1, 2, 5, 3, 4, 7, 8, 6);

function minimumBribes($q)
{
    $count = 0;
    for ($i = count($q) - 1; $i >= 0; $i--) {
        if ($q[$i] - ($i + 1) > 2) {
            echo "Too chaotic" . PHP_EOL;
            return;
        } else {
            for ($j = $q[$i] - 2; $j < $i; $j++)
                if (isset($q[$j]))
                    if ($q[$j] > $q[$i]) $count++;
        }
    }
    echo $count . PHP_EOL;
}
minimumBribes($q);
//-----------------------------------------------------
$arr = array(2, 3, 1, 3);
function birthdayCakeCandles($arr)
{
    $count = array_count_values($arr);
    ksort($count);
    return end($count);
}
birthdayCakeCandles($arr);

//-----------------------------------------------------
$a = array(17, 28, 30);
$b = array(99, 16, 8);

// Complete the compareTriplets function below.
function compareTriplets($a, $b)
{
    $temp = array('a' => 0, 'b' => 0);
    for ($i = 0; $i < count($a); $i++) {
        if ($a[$i] == $b[$i]) {
            $temp['a'] += 0;
            $temp['b'] += 0;
        } else if ($a[$i] > $b[$i]) {
            $temp['a'] += 1;
            $temp['b'] += 0;
        } else if ($a[$i] < $b[$i]) {
            $temp['a'] += 0;
            $temp['b'] += 1;
        }
    }
    return $temp;
}

$arr = array(1, 3, 5, 2, 4, 6, 7);
//$arr = array(4, 3, 1, 2);
//-----------------------------------------------------
//TODO: требует доработки
function minimumSwaps($arr)
{
    $count = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] != $i + 1) {
            $t = $i;
            while ($arr[$t] != $i + 1) {
                $t++;
            }
            $temp = $arr[$t];
            // echo $temp .' '. $arr[$t] .' '.$arr[$i];
            $arr[$t] = $arr[$i];
            $arr[$i] = $temp;
            $count++;
        }
    }
    //print_r($arr);
    return $count;
}
