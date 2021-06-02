<?php
  $conn = new mysqli('localhost', 'mskim', 'sookmyung1906', 'baseball_players');
  $sql = "SELECT * FROM Hitter ORDER BY Hno";
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="table.css">
  <title>BATTING</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th class="no">No.</th>
        <th class="name">이름</th>
        <th class="record1">타수</th>
        <th class="record2">타율</th>
        <th class="record3">출루율</th>
        <th class="record4">장타율</th>
        <th class="record5">wRC+</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>".$row['Hno']."</td>";
          echo "<td>".$row['Hname']."</td>";
          echo "<td>".$row['AB']."</td>";
          echo "<td>".number_format($row['H_AVG'], 3)."</td>";
          echo "<td>".number_format($row['OBP'], 3)."</td>";
          echo "<td>".number_format($row['SLG'], 3)."</td>";
          echo "<td>".number_format($row['wRC'], 1)."</td>";
          echo "<tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>

