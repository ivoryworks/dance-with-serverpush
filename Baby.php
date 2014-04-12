<?php
@set_time_limit(0);
@ignore_user_abort(false);
@ini_set( 'zlib.output_compression', 'off' );
header('Cache-Control: no-cache');
header('Pragma: no-cache');
header("Content-Type: multipart/x-mixed-replace;boundary=END",true);
print "--END\n";

$index = 0;
$prev = true;
while(1) {
    $path = sprintf('./img/baby_%02d.png', $index);

    print "Content-Type: image/png\n";
    print sprintf("Content-Length: %d\n\n", filesize($path));
    readfile($path);
    ob_flush();
    flush();
    print "\n\n--END\n";
    usleep(100000);

    $index = $prev ? $index+1:$index-1;
    if ($index <= 0 || 56 <= $index) {
        $prev = !$prev;
    }
}
// print "--END--\n";
