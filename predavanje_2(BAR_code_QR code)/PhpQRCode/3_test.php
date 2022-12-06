<?php
/*

https://www.php.net/manual/en/function.ob-start.php

This function will turn output buffering on. While output buffering is active no output is sent from the script (other
than headers),
instead the output is stored in an internal buffer.

The contents of this internal buffer may be copied into a string variable using ob_get_contents().
To output what is stored in the internal buffer, use ob_end_flush(). Alternatively, ob_end_clean() will silently discard
the buffer contents.

*/

ob_start();

echo "Luka ";

$out1 = ob_get_contents();

echo "World";

$out2 = ob_get_contents();
//ob_flush();
ob_end_clean();

var_dump($out1, $out2);
