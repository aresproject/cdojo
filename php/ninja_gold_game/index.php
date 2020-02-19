<!doctype html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <title>Make Money!!!</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fafafa">
  <style>

    .container {margin-top: 15px; margin-bottom: 20px;}
    .controller {width: 1280px; text-align: center; }
    .places {
      width: 23%;
      height: 250px;
      border: 1px solid black;
      margin: auto;
      display: inline-table;
      text-align: center;
    }
    .resultBox {
      border: 2px solid black;
      width: 92vw;
      overflow: auto;
      height: 150px;
    }

    p, label, input {font-size: 22px;}


    input[type="submit"] {
      width: 207px;
      height: 30px;
      font-size: 15px;
      border: none;
      background-color: orange;
      color: #fff;
      border-radius: 15px;
  }
  </style>
</head>

<body>


<div class="container">
  <label for="">Your Gold:</label>

  <?php
    session_start();

    if(isset($_SESSION['Total_gold'])) {
      echo '<input type="text" name="goldValue" value="' . $_SESSION['Total_gold'] . '">';
    }
    else {
      echo '<input type="text" name="goldValue" value="0">';
      $_SESSION['pid'] = 1;
    }
  ?>

</div>
<div class="container">
  <form class="" action="process.php" method="post">
    <input type="hidden" name="action" value="reset">
    <input type="submit" value="Start Again From Scratch!">
  </form>
</div>

<div class="container">
  <div class="places">
    <p>Farm</p>
    <p>(earns 10-20 golds)</p>
    <form class="" action="process.php" method="post">
      <input type="hidden" name="action" value="farm">
      <input type="submit" value="Find Gold!">
    </form>
  </div>
  <div class="places">
    <p>Cave</p>
    <p>(earns 5-10 golds)</p>
    <form class="" action="process.php" method="post">
      <input type="hidden" name="action" value="cave">
      <input type="submit" value="Find Gold!">
    </form>
  </div>
  <div class="places">
    <p>House</p>
    <p>(earns 2-5 golds)</p>
    <form class="" action="process.php" method="post">
      <input type="hidden" name="action" value="house">
      <input type="submit" value="Find Gold!">
    </form>
  </div>
  <div class="places">
    <p>Casino!</p>
    <p>(earns/lose 0-50 golds)</p>
    <form class="" action="process.php" method="post">
      <input type="hidden" name="action" value="casino">
      <input type="submit" value="Find Gold!">
    </form>
  </div>
</div>

<div class="container">
  <p>Activities:</p>
  <div class="resultBox">
    <?php
      if(isset($_SESSION['results'])) {
        $i = 0;
        foreach($_SESSION['results'] as $collection){
          foreach($collection as $value) {
            echo $value;
          }
        }
      }
     ?>
  </div>

</div>



</body>

</html>
