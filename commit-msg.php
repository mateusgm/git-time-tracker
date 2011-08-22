#!/usr/bin/php
<?

   if (!isset($argv[1])) exit(1);
   
   $msg      = file_get_contents($argv[1]);
   
   if ($msg[0] == '[') exit(0);
   
   require_once('functions.php');   
   $commits  = getCommits(1);
   
   if(empty($commits)) exit(0);
   
   $previous = strtotime ($commits[0]['date']);
   $spent    = round((time() - $previous)/60,2);
   $msg      = "[${spent}m] ${msg}";
   
   file_put_contents($argv[1], $msg);
   
?>
