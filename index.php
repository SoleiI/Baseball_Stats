<?php
  $mysqli = new mysqli('localhost', 'mskim', 'sookmyung1906', 'baseball_players');
  if($mysqli) {
    echo 'MySQL 연결 성공';
  } else {
    echo 'MySQL 연결 오류';
  }
  mysqli_close($mysqli);
?>


