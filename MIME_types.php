<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

// $N: Number of elements which make up the association table.
fscanf(STDIN, "%d", $N);
// $Q: Number Q of file names to be analyzed.
fscanf(STDIN, "%d", $Q);
$refs = [];
for ($i = 0; $i < $N; $i++)
{
    // $EXT: file extension
    // $MT: MIME type.
    fscanf(STDIN, "%s %s", $EXT, $MT);
    $refs[strtolower($EXT)] = $MT;
}

for ($i = 0; $i < $Q; $i++)
{
    $FNAME = stream_get_line(STDIN, 256 + 1, "\n");// One file name per line.
    $ext = strtolower(substr(strrchr($FNAME, '.'), 1));
    if (isset($refs[$ext])) {
        echo("$refs[$ext]\n");
    } else {
        echo("UNKNOWN\n");
    }
}


// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)


// For each of the Q filenames, display on a line the corresponding MIME type. If there is no corresponding type, then display UNKNOWN.
?>
