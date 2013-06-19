#!/usr/bin/php
<?
   date_default_timezone_set('America/Sao_Paulo');
   require_once('gtt-functions.php');
   
   $commits = getCommits ();
   $time    = getTotalTime ($commits);
   $rate    = getHourlyRate ($argv, $time); 
   
   printResults ($time, $rate);

?>
