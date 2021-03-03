//-----------------------------------------------------
<?php
$ar = [6, 5, 2, 3, 5, 2, 2, 1, 1, 5, 1, 3, 3, 3, 5];
$count = 0;
$arr_count_values=array_count_values ($ar);
foreach ($arr_count_values as $item) {
    $count+=floor($item/2);
}
return $count;
//-----------------------------------------------------

$steps = 10;
$path = str_split('DUDDDUUDUU');
function countingValleys($steps, $path)
{
    $points = array();
    $vallleys = 0;
    for ($i = 0; $i < $steps; $i++) {
        if ($path[$i] == 'U') {
            array_push($points, 1);
        } else if ($path[$i] == 'D') {
            array_push($points, -1);
        }
        if (array_sum($points) == 0 && $i >= 1) {
            if ($points[$i] != -1) {
                $vallleys++;
            }
        }
    }
    return  $vallleys;
}

echo countingValleys($steps, $path);
//-----------------------------------------------------
function jumpingOnClouds($c) {
    $jump_counts = 0;
    for ($i = 0; $i < count($c) - 1; $i++) {
        if (isset($c[$i + 1])) {
            if (isset($c[$i + 2]) && $c[$i + 2] == 0) {
                $i+=1;
                $jump_counts++;
            }
            elseif($c[$i + 1] == 0){
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
    $string_lenght = count(str_split($s));
    $number_of_char = intval($n / $string_lenght);
    $tt = 0;
    if ($n < $string_lenght){
        $tt = substr_count($s, 'a', 0, $n);
    }
    $result = $n - ($number_of_char * $string_lenght);
    $t = 0;
    if ($tt) {
        $t = $tt;
    } else {
        $r = substr_count(substr($s, 0, $result), 'a');
        $t=$number_of_char*$sum_of_a+$r;
    }
    return $t;
}
//-----------------------------------------------------

$arr = array(
    array(-1, -1, 0 ,-9 ,-2 ,-2),
    array(-2, -1, -6, -8, -2, -5),
    array(-1, -1, -1, -2, -3, -4),
    array(-1, -9, -2, -4, -4, -5),
    array(-7, -3, -3, -2, -9, -9),
    array(-1, -3, -1, -2, -4, -5)
);

function hourglassSum($arr)
{
    $sum=array();
    for ($j = 0; $j < count($arr); $j++) {
        for ($i = 0; $i < count($arr); $i++) {
            if (isset($arr[$j][$i + 2]) && isset($arr[$j + 2][$i])) {
                array_push($sum,($arr[$j][$i])+($arr[$j][$i + 1])+($arr[$j][$i + 2])
                                    +($arr[$j + 1][$i + 1])
                +($arr[$j + 2][$i])+($arr[$j + 2][$i + 1])+($arr[$j + 2][$i + 2]));
            }
        }
    }
    return max($sum);
}
//-----------------------------------------------------