<?

   function getLog ($n = '') {
      // $stdin   = 'php://stdin';
      if ($n) $command = "git log -n ${n}";
      else $command = "git log";
      $command .= ' 2> /dev/null';
      return shell_exec ($command);
   }

   function parseCommit ($commit) {
      $elements = array_map ('trim', explode ("\n\n", $commit));
      $date = $elements[0];
      $msg = $elements[1];
      $spent = getTimeSpent ($msg);
      return array ('date' => $date, 'msg' => $msg, 'spent' => $spent);
   }
   
   function getCommits ($n = '') {
      $log = getLog($n);
      $commits_raw = explode('Date:   ', $log);
      array_shift($commits_raw);
      $commits = array_map ('parseCommit', $commits_raw);
      return $commits;
   }
   
   function getTimeSpent ($msg) {
       if ($msg[0] != '[') return 0;
       list ($time, $unit) = sscanf ($msg, "[%f%s");
       if ($unit == 'hr]' || $unit == 'hrs]') return $time * 60;
       else return $time;
   }
   
   function getTotalTime ($commits) {
      $total = 0;
      foreach ($commits as $commit) {
         $now = strtotime ($commit['date']);
         $spent = $commit['spent'];
         if ($spent) $total += $spent;
      }      
      return $total;
   }
   
   function getHourlyRate ($argv, $time) {
      if (isset($argv[1])) return round (60*$argv[1]/$time, 2);
      else return 0;
   }
   
   function setLastCommit ($commits) {
      if ($commits[0]['msg'][0] == '[')  return $commits;
      $previous = strtotime ($commits[1]['date']);
      $last = strtotime ($commits[0]['date']);
      $spent = round(($last - $previous)/60,2);
      $msg = "[${spent}m] " . $commits[0]['msg'];
      exec("git commit --amend -m \"${msg}\"");
      $commits[0]['spent'] = $spent;
      return $commits;
   }
   
   function printResults ($time, $rate) {
      $hrs = floor ($time/60);
      $min = round($time)%60;
      echo "- Invested: ${hrs}hrs ${min}min\n";      
      if ($rate) echo "- Earning: \$${rate}/hr\n";
   }

?>
