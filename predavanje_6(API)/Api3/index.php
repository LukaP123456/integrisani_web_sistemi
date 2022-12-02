<?php
/*
 Additional informations:

https://www.php.net/manual/en/filter.filters.validate.php

FILTER_VALIDATE_IP

 */

require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';
require_once 'Mobile-Detect-2.8.34/Mobile_Detect.php';

if (!isset($_COOKIE['VISITED'])) {
    
    $mobile = false;
    $vpn = false;
    $response = "";
    
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

    if ($deviceType !== "computer") {
        $mobile = true;
    }

    $ipAddress = getIpAddress();
    //$ipAddress = "103.14.26.0"; // mexico
    
    $urlVpn = "https://ipqualityscore.com/api/json/ip/SADciIBLgpMnJ4kjY3rA6t7vZyG5FgHj/$ipAddress?strictness=0&allow_public_access_points=true&lighter_penalties=true&mobile=$mobile";
   // https://ipqualityscore.com/api/json/ip/SADciIBLgpMnJ4kjY3rA6t7vZyG5FgHj/103.14.26.0?strictness=0&allow_public_access_points=true&lighter_penalties=true&mobile=true

    /*
        Parameters in request:
        •	$apiKey – your personal API key
        •	$ipAddress – IP address
        •	strictness=0 - uses the lowest strictness (0-3) for Fraud Scoring. Increasing this value will expand the tests we perform. Levels 2+ have a higher risk of false-positives
        •	allow_public_access_points=true - allows corporate and public connections like Institutions, Hotels, Businesses, Universities, etc
        •	lighter_penalties=true - Lowers scoring and proxy detection for mixed quality IP addresses to prevent false-positives
        •	mobile=true - Forces the IP to be scored as a mobile device. Passing the "user_agent" will automatically detect the device type.

   */
   
    $urlApi = "https://www.iplocate.io/api/lookup/$ipAddress";
    
    $response = getCurlData($urlVpn);
    
    $vpnResults = json_decode($response, true);
    
    if (isset($vpnResults['vpn'])) {
        $vpn = $vpnResults['vpn'];
    }
    
    if($ipAddress == '127.0.0.1') {
        $vpn = false;
    }
    
    $country = "";
    

    $apiData = getCurlData($urlApi);
    
    $apiResults = json_decode($apiData, true);
    
    if (isset($apiResults['country'])) {
        $country = $apiResults['country'];
    }
    
    if ($deviceType !== 'computer' or in_array($country, $restrictedCountries) or $vpn) {
        $restrictedAccess = true;
    }

    $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
    
    /*
    if ($deviceType !== 'computer' or in_array($country, $restrictedCountries) or $vpn) {
        $restrictedAccess = true;
    }
    */
    
    insertIntoLog($ipAddress, $deviceType, $userAgent, $country, $connection);
    setcookie('VISITED', 'YES', time() + 10); // 900
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>Task 1</title>
</head>
<body>
<a href="show_logs.php">Show logs</a>
</body>
</html>