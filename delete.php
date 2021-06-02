<?php
  $conn = new mysqli('localhost', 'mskim', 'sookmyung1906', 'baseball_players');
  $name = $_POST['drop__name'];

  $conn->query('SET foreign_key_checks = 0');
  $conn->query("DELETE FROM player, pitcher, hitter, defense
  USING (((player LEFT JOIN pitcher ON Playerno = Pno) 
  LEFT JOIN hitter ON Playerno = Hno)
  LEFT JOIN defense ON Playerno = Dno) 
  WHERE Dname = '$name'");
  $conn->query('SET foreign_key_checks = 1');

  echo $name;
  echo " 기록 삭제 완료";
?>

