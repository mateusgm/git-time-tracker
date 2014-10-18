#!/usr/bin/env php
<?php
   date_default_timezone_set('America/Sao_Paulo');
   require_once('gtt-functions.php');
   
   $params = implode(' ', array_slice($argv, 1));
   $commits = getCommits($params);
   $time    = getTotalTime ($commits);
   // $rate    = getHourlyRate($argv, $time);
   $rate = '';
   
   printResults ($time, $rate);

?>
