<?php

  require "functions.php";

  $url = "http://do-su-dairyquestions.hatenablog.com/rss";
  $nKiji = 5;
  $response = getRssFeeDArray($url,$nKiji);

  foreach($response as $row){
    echo $row['title'];
  }

?>
