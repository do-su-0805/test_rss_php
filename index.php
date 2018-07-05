<?php

  require "functions.php";

  $url = "http://do-su-dairyquestions.hatenablog.com/rss";
  $nKiji = 5;
  $response = getRssFeeDArray($url,$nKiji);

#  var_dump($response);
  foreach($response as $row){
#  var_dump($row);
    echo date( "Y/m/d", $row['time']);
    ?>
    <img src="<?php print $row['image']; ?>" alt="<?php print $row['title']; ?>" width="100">
    <a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['title']; ?></a>
    <br>
    <?php
  }
?>
