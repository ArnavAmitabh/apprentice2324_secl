<?php
date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d H:i:s");

$date1=date_create("2024-06-14");
date_time_set($date1,0,0);
$sdate= date_format($date1,"Y-m-d H:i:s") ;

$date2=date_create("2024-12-21");
date_time_set($date2,23,59);
$edate= date_format($date2,"Y-m-d H:i:s") ;


	 if ($sdate > $today && $edate > $today) {
	 echo "<script type='text/javascript'>if(!alert('Recruitment Portal will open soon!')){window.location.href = 'https://www.secl-cil.in';}</script>";
  exit();
	 }
	 else if ( $edate < $today) 
	 {
		echo "<script type='text/javascript'>if(!alert('Recruitment Portal is now closed!')){window.location.href = 'https://www.secl-cil.in';}</script>";
  exit(); 
	 }
error_reporting(E_ERROR | E_PARSE);
header('X-Frame-Options: SAMEORIGIN');
header("X-XSS-Protection: 1");
header('X-Content-Type-Options: nosniff');
header("Content-Security-Policy: default-src 'self'; script-src 'self' https://www.secl-cil.in https://ajax.googleapis.com  https://stackpath.bootstrapcdn.com 'unsafe-inline' 'unsafe-eval'; style-src 'self' https://stackpath.bootstrapcdn.com https://use.fontawesome.com https://www.secl-cil.in 'unsafe-inline' ;img-src 'self' https://www.secl-cil.in 'unsafe-inline';form-action 'self' ;font-src 'self' https://www.secl-cil.in  https://use.fontawesome.com ;frame-ancestors 'self' https://www.secl-cil.in");
session_set_cookie_params(0,'/','',false,true);
 ?> 
