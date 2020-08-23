<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/


$row_check = true;
$col_check = true;
$sub_check = true;
$matrix = [];

for ($i = 0; $i < 9; $i++)
{
    $inputs = explode(" ", fgets(STDIN));
    $tmp_line = [];
    for ($j = 0; $j < 9; $j++)
    {
        $n = intval($inputs[$j]);
        if (in_array($n,$tmp_line) === true){
            $row_check = false;
            break;
        }
        $tmp_line[]=$n;
    }
    $matrix[] = $tmp_line;
}

//col check
if ($row_check){
    for ($c = 0; $c < 9; $c++){
        $tmp_col = array_unique(array_column($matrix, $c));
        if (count($tmp_col) != 9){
            $col_check = false;
            break;
        }
    }
}

//subgrid check
if ($row_check && $col_check){
    $subgrids = [
        'sub1' => [],
        'sub2' => [],
        'sub3' => [],
        'sub4' => [],
        'sub5' => [],
        'sub6' => [],
        'sub7' => [],
        'sub8' => [],
        'sub9' => []
    ];

    for ($s = 0; $s < 9; $s++){
        $tmp_row = $matrix[$s];
        if ($s < 3){
            $subgrids['sub1'] = array_merge($subgrids['sub1'], array_slice($tmp_row, 0, 3));
            $subgrids['sub2'] = array_merge($subgrids['sub2'], array_slice($tmp_row, 3, 3));
            $subgrids['sub3'] = array_merge($subgrids['sub3'], array_slice($tmp_row, 6, 3));
        } else if ( $s >= 3 && $s < 6){
            $subgrids['sub4'] = array_merge($subgrids['sub4'], array_slice($tmp_row, 0, 3));
            $subgrids['sub5'] = array_merge($subgrids['sub5'], array_slice($tmp_row, 3, 3));
            $subgrids['sub6'] = array_merge($subgrids['sub6'], array_slice($tmp_row, 6, 3));
        } else {
            $subgrids['sub7'] = array_merge($subgrids['sub7'], array_slice($tmp_row, 0, 3));
            $subgrids['sub8'] = array_merge($subgrids['sub8'], array_slice($tmp_row, 3, 3));
            $subgrids['sub9'] = array_merge($subgrids['sub9'], array_slice($tmp_row, 6, 3));
        }
    }

    foreach ($subgrids as $grid){
        if (count(array_unique($grid)) != 9){
            $sub_check  = false;
            break;
        }
    }
}


// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)

echo($row_check === true && $col_check === true && $sub_check === true ? 'true' : 'false'."\n");
?>
