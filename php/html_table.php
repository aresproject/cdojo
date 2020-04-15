

<html>
  <head>
  	<title></title>
    <style>
      table tr th, table tr td {border: 1px solid black;}
      .highlight {background-color: black;}
      .highlight td {color: white;}
    </style>
  </head>
<body>
  <p>
    <?php
      $users = array(
         array('first_name' => 'Michael', 'last_name' => 'Choi'),
         array('first_name' => 'John', 'last_name' => 'Supsupin'),
         array('first_name' => 'Mark', 'last_name' => 'Guillen'),
         array('first_name' => 'KB', 'last_name' => 'Tonel'),
         array('first_name' => 'Coco', 'last_name' => 'Pimentel'),
         array('first_name' => 'Tito', 'last_name' => 'Sotto'),
         array('first_name' => 'Manny', 'last_name' => 'Pacquiao'),
         array('first_name' => 'Sonny', 'last_name' => 'Angara'),
         array('first_name' => 'Franklin', 'last_name' => 'Drilon'),
         array('first_name' => 'Risa', 'last_name' => 'Hontiveros'),
         array('first_name' => 'Grace', 'last_name' => 'Poe'),
      );
      $count = 1;
    ?>
    <table>
      <tr>
        <th>Users #</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Full Name</th>
        <th>Full Name in Uppercase</th>
        <th>Length of Fullname</th>
      </tr>
      <?php
        foreach($users as $record) {

          //echo "<tr class='highlight'>";
          $stat = styler($count);
          echo "<tr class='" . $stat . "'>";
          echo "<td>" . $count . "</td>";
          echo "<td>" . $record['first_name'] . "</td>";
          echo "<td>" . $record['last_name'] . "</td>";
          echo "<td>" . $record['first_name'] . " " . $record['last_name'] . "</td>";
          echo "<td>" . strtoupper($record['first_name']) . " " . strtoupper($record['last_name']) . "</td>";
          $letters = strlen($record['first_name']) + strlen($record['last_name']);
          echo "<td>" . $letters . "</td>";
          echo "</tr>";
          $count++;
        }

        function styler($val) {
          if ($val % 5 === 0) {
            return "highlight";
          }
          else {
            return "";
          }

        }

      ?>
    </table>
  </p>
</body>
</html>
