<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

// $n: the number of temperatures to analyse
fscanf(STDIN, "%d", $n);
$inputs = explode(" ", fgets(STDIN));
$temperatures = [];
for ($i = 0; $i < $n; $i++)
{
    $t = intval($inputs[$i]); // a temperature expressed as an integer ranging from -273 to 5526
    $temperatures[] = $t;
}

if (!empty($temperatures)){
    $control = $temperatures[0];
    for ($j = 1; $j < $n; $j++){
        if (abs($temperatures[$j]) < abs($control) || (abs($temperatures[$j] === abs($control)) && $temperatures[$j] > 0) ){
            $control = $temperatures[$j];
        }
    }
} else {
    $control = 0;   
}

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)
error_log(var_export($temperatures, true));
echo($control. "\n");
?>
