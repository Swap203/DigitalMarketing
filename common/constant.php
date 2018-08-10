<?php

date_default_timezone_set('Asia/Kolkata');
define("CURRENTTIME", date('Y-m-d H:i:s'));
define("CURRENTDATE", date('d-m-Y'));
define("OWNERCOMPANYNAME", "Digital Marketing Admin");

/*Email account vertification Link*/
$serverPath = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/Swapnil/digitalMarketing/";

/*
define("HOST","mail.studyleagueit.com");
define("PORT",25);
define("USERNAME","contactus@studyleagueit.com");
define("PASSWORD","M@dhu@99");
*/

/*
define("SERVERPATHS", $serverPath);
define("NOREPLY","contactus@studyleagueit.com");
define("HOST","mail.lyricallife.in");
define("PORT",25);
define("USERNAME","contactus@lyricallife.in");
define("PASSWORD","contactus@LyricalLife");


define("SERVERPATHS", $serverPath);
define("NOREPLY","contactus@lyricallife.in");*/