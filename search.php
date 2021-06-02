<?php
  $conn = new mysqli('localhost', 'mskim', 'sookmyung1906', 'baseball_players');
  $p_name = $_POST['p_name'];

  $sql = "SELECT Position
  FROM defense
  WHERE Dname = '$p_name'";

  $sql1 = "SELECT * 
  FROM player, hitter 
  WHERE Hname = '$p_name'
  AND Playerno = Hno";
  
  $sql2 = "SELECT * 
  FROM player, pitcher 
  WHERE Pname = '$p_name'
  AND Playerno = Pno";
  
  $result = mysqli_query($conn, $sql);
  $p_row = mysqli_fetch_array($result);
  $position = 0;

  if (!($p_row)){
    echo "검색 실패<br>";
    echo "대상이 없습니다.";
  }
  else {
    $position = $p_row['Position'];
    
    if ($position != 'P') {
      $result1 = mysqli_query($conn, $sql1);
      $row = mysqli_fetch_array($result1);
    }
    else {
      $result2 = mysqli_query($conn, $sql2);
      $row = mysqli_fetch_array($result2);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="table.css">
</head>
<body>
  <div>
    <div style="display: flex; align-items: baseline;">
      <?php
        if ($position !== 0) {
          echo "<h2 style='margin-right: 20px'>";
          if ($position == 'P') {
            echo $row['Pname'];
          }
          else {
            echo $row['Hname'];
          }
          echo "</h2>";
          echo "No. ";
          echo $row['Playerno'];
          echo " ";
          echo "<strong style='margin-left: 10px'>".$position."</strong>";
        }
      ?>
    </div>
    <p>
      <?php 
        if ($position !== 0) {
          echo "출생 ";
          echo $row['Birth'];
          echo "년";
        }
      ?>
    </p>
    <p>
      <?php 
        if ($position !== 0) {
          echo "연봉 ";
          echo $row['Salary'];
          echo "만";
        }
      ?>
    </p>
    <p>
      <?php 
        if ($position !== 0) {
          echo "1군 통산 ";
          echo $row['Season'];
          echo "시즌";
        }
      ?>
    </p>
  </div>
  <br>
  <div>
    <?php
      if ($position !== 0) {
        echo "<p><b>2021시즌 기록</b></p>";
        echo "<table border='1'><thead><tr><th>WAR</th>";
        echo "<th>";
        if ($position != 'P') echo '타율';
        else echo 'ERA';
        echo "</th>";

        echo "<th>";
        if ($position != 'P') echo '출루율';
        else echo 'WHIP';
        echo "</th>";
        
        echo "<th>";
        if ($position != 'P') echo '장타율';
        else echo 'G';
        echo "</th>";

        echo "<th>";
        if ($position != 'P') echo 'wRC+';
        else echo '이닝';
        echo "</th></tr></thead>";
        echo "<tbody><tr>";

        echo "<td>";
        echo number_format($row['WAR'], 2);
        echo "</td>";
        
        echo "<td>";
        if ($position != 'P') echo number_format($row['H_AVG'], 3);
        else echo number_format($row['ERA'], 2);
        echo "</td>";
        
        echo "<td>";
        if ($position != 'P') echo number_format($row['OBP'], 3);
        else echo number_format($row['WHIP'], 2);
        echo "</td>";
        
        echo "<td>";
        if ($position != 'P') echo number_format($row['SLG'], 3);
        else echo number_format($row['Game']);
        echo "</td>";
        
        echo "<td>";
        if ($position != 'P') echo number_format($row['wRC'], 1);
        else echo number_format($row['Inning'], 1);
        echo "</td></tr></tbody></table>";
      }
    ?>
  </div>
</body>
</html>

