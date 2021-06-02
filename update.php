<?php
  $conn = new mysqli('localhost', 'mskim', 'sookmyung1906', 'baseball_players');
  $name = $_POST['update__name'];
  $salary = $_POST['update__salary'];

  $update = "UPDATE player, defense
    SET player.Salary = '$salary'
    WHERE Dname = '$name'
    AND Dno = Playerno";
    
  $result = mysqli_query($conn, $update);
  echo "업데이트 완료";
  echo "<br>이름 : ";
  echo $name;
  echo "<br>연봉 : ";
  echo $salary;
?>

