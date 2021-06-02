<?php
  $conn = new mysqli('localhost', 'mskim', 'sookmyung1906', 'baseball_players');
  $sql = "SELECT * FROM Pitcher ORDER BY Pno";
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="table.css">
  <title>PITCHING</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th class="no">No.</th>
        <th class="name">이름</th>
        <th class="record1">ERA</th>
        <th class="record2">WHIP</th>
        <th class="record3">경기</th>
        <th class="record4">이닝</th>
        <th class="record5">선발</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>".$row['Pno']."</td>";
          echo "<td>".$row['Pname']."</td>";
          echo "<td>".number_format($row['ERA'], 2)."</td>";
          echo "<td>".number_format($row['WHIP'], 2)."</td>";
          echo "<td>".$row['Game']."</td>";
          echo "<td>".number_format($row['Inning'], 1)."</td>";
          echo "<td>".$row['S_Game']."</td>";
          echo "<tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>

