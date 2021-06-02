<?php
  $conn = new mysqli('localhost', 'mskim', 'sookmyung1906', 'baseball_players');
  $sql = "SELECT * FROM Defense ORDER BY Dno";
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="table.css">
  <title>DEFENSE</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th class="no">No.</th>
        <th class="name">이름</th>
        <th class="record1">포지션</th>
        <th class="record2">E</th>
        <th class="record3">이닝</th>
        <th class="record4">도루저지</th>
        <th class="record5">WAA</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>".$row['Dno']."</td>";
          echo "<td>".$row['Dname']."</td>";
          echo "<td>".$row['Position']."</td>";
          echo "<td>".$row['D_error']."</td>";
          echo "<td>".number_format($row['Inning'], 1)."</td>";
          if ($row['CS']) {
            echo "<td>".number_format($row['CS'], 2)."</td>";
          }
          else echo "<td>".$row['CS']."</td>";
          if ($row['WAA']) {
            echo "<td>".number_format($row['WAA'], 3)."</td>";
          }
          else echo "<td>".$row['WAA']."</td>";
          echo "<tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>

