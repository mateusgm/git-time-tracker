#!/usr/bin/php
<?

   require_once('functions.php');
   
   $commits = getCommits ();
   $time    = getTotalTime ($commits);
   $rate    = getHourlyRate ($argv, $time); 
   
   printResults ($time, $rate);

?>
