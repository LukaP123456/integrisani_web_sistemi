<?php
$header_ua = strtolower($_SERVER['HTTP_USER_AGENT']);
$keywords = array("nokia", "touch", "samsung", "sonyericsson", "alcatel", "panasonic", "tosh", "benq", "sagem", "android", "iphone", "berry", "palm", "mobi", "lg", "symb", "kindle", "phone");
$mobile = false;
$match = "";

foreach ($keywords as $keyword) {
    if (strpos($header_ua, $keyword) !== false) // http://php.net/manual/en/function.strpos.php
    {
        $mobile = true;
        $match = $keyword;
        break;
    }
}
echo "<p><b>user agent string:</b> $header_ua</b>";

if ($mobile) {
    echo "<p>You are using mobile device. (search term: $match)</p>";
    //header("Location:mobile.php");
    //exit();
} else {
    echo "<p>You are not using mobile device.</p>";
}
?>