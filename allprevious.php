<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>US Gas Price History-All Records</title>
    <meta name="description" content="Discover what the price of gas used to cost!">
    <meta name="keywords" content="gas, price, gas prices, history, gas price chart">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="home.php">US Gas Prices</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Today's Prices</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="allprevious.php">All Previous Recorded Prices<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </ul>
        </div>
      </nav>
    <br></br>
    <h1 align="center"><font size="7">All Our Recorded Gas Prices</font></h1>
    <?php
        $cnx = new mysqli('localhost', 'root', 'root', 'gas');
    
        if ($cnx->connect_error)
            die('Connection failed: ' . $cnx->connect_error);
        $select_instruct = "SELECT * FROM imgs";
        $cursor = $cnx->query($select_instruct);
        if ($cursor->num_rows > 0) {
          
          while ($row = $cursor->fetch_assoc()) {
            echo '<h1 style="text-align: center;"><font size="6">'
            ."Date for graph below: ".$row['date'].'</font></h1>';
            
            $img=hex2bin($row['img']);
            echo '<img src="data:image;base64,'.base64_encode($img).'" alt="Bar graph of prices, failed to load" >';
          }    
        }
        else {
            echo "0 results";
        }
        $cnx->close();
    ?>
      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>