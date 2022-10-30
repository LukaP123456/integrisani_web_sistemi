<?php
// http://mobiledetect.net/
// http://demo.mobiledetect.net/
// https://github.com/serbanghita/Mobile-Detect/wiki/Code-examples
ini_set('display_errors', 'Off');
require_once 'Mobile-Detect-2.8.39/Mobile_Detect.php';

$detect = new Mobile_Detect();

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

if ($deviceType === "phone" OR $deviceType === "tablet") {
    echo "You are mobile! ";

    if ($detect->isiOS()) {
        echo "<br>Your mobile has iOS";
    }

    if ($detect->isAndroidOS()) {
        echo "<br>Your mobile has Android";
    }

} else {
    echo "You are computer!";
}