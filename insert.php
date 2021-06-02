<?php
  $conn = new mysqli('localhost', 'mskim', 'sookmyung1906', 'baseball_players');
  $name = $_POST['insert__name'];
  $no = $_POST['insert__no'];

  $war = $_POST['insert__basic1'];
  $birth = $_POST['insert__basic2'];
  $season = $_POST['insert__basic3'];
  $salary = $_POST['insert__basic4'];

  $stat = $_POST['insert__stat'];

  $record1 = $_POST['insert__detail1'];
  $record2 = $_POST['insert__detail2'];
  $record3 = $_POST['insert__detail3'];
  $record4 = $_POST['insert__detail4'];
  $record5 = $_POST['insert__detail5'];

  $defense1 = $_POST['insert__defense1'];
  $defense2 = $_POST['insert__defense2'];
  $defense3 = $_POST['insert__defense3'];
  $defense4 = $_POST['insert__defense4'];
  $defense5 = $_POST['insert__defense5'];
  
  $conn->query("INSERT INTO PLAYER
  VALUES ('$no', '$birth', '$season', '$salary', '$war')");

  switch ($stat) {
    case 'pitching':
      $conn->query("INSERT INTO PITCHER
      VALUES ('$no', '$name', '$record1', '$record2', '$record3', '$record4', '$record5')");
      break;
      
    case 'hitting':
        $conn->query("INSERT INTO HITTER
        VALUES ('$no', '$name', '$record1', '$record2', '$record3', '$record4', '$record5')");
      break;
      
    default:
      break;
  }

  if ($defense1 == 'C') {
    $conn->query("INSERT INTO DEFENSE
    VALUES ('$no', '$name', '$defense1', '$defense2', '$defense3', '$defense4', '$defense5')");
  }
  else if ($defense1 == 'DH') {
    $conn->query("INSERT INTO DEFENSE (Dno, Dname, Position, Inning)
    VALUES ('$no', '$name', '$defense1', '$defense2')");
  }
  else {
    $conn->query("INSERT INTO DEFENSE (Dno, Dname, Position, Inning, D_error, WAA)
    VALUES ('$no', '$name', '$defense1', '$defense3', '$defense2', '$defense5')");
  }
  
  echo $name;
  echo " 정보 추가 완료";
?>


