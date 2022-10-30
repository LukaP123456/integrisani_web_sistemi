<?php

var_dump($_SERVER);
$accept = "";
$user_agent = "";
$accept_charset = "";
$accept_language = "";
$x_wap_profile = "";
$profile = "";

if (isset($_SERVER["HTTP_ACCEPT"]))
    $accept = $_SERVER["HTTP_ACCEPT"];

if (isset($_SERVER["HTTP_USER_AGENT"]))
    $user_agent = $_SERVER["HTTP_USER_AGENT"];

if (isset($_SERVER["HTTP_ACCEPT_CHARSET"]))
    $accept_charset = $_SERVER["HTTP_ACCEPT_CHARSET"];

if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
    $accept_language = $_SERVER["HTTP_ACCEPT_LANGUAGE"];

if (isset($_SERVER["HTTP_X_WAP_PROFILE"]))
    $x_wap_profile = $_SERVER["HTTP_X_WAP_PROFILE"];

if (isset($_SERVER["HTTP_PROFILE"]))
    $profile = $_SERVER["HTTP_PROFILE"];

echo "<h1>ACCEPT</h1>";
echo "<p>$accept</p><hr />";

echo "<h1>USER AGENT</h1>";
echo "<p>$user_agent</p><hr />";

echo "<h1>ACCEPT CHARSET</h1>";
echo "<p>$accept_charset</p><hr />";

echo "<h1>ACCEPT LANGUAGE</h1>";
echo "<p>$accept_language</p><hr />";


echo "<h1>X_WAP_PROFILE</h1>";
echo '<p><a href="' . $x_wap_profile . '">' . $x_wap_profile . '</a></p>';

echo "<h1>PROFILE</h1>";
echo '<p><a href="' . $profile . '">' . $profile . '</a></p>';

?>