<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>US Gas Price History-About</title>
    <meta name="description" content="Discover the origin story behind this project here!">
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
            <li class="nav-item">
            <a class="nav-link" href="allprevious.php">All Previous Recorded Prices</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about.php">About<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
    <br></br>
    <h1 align="center"><font size="7">About This Project</font></h1>

    <h4 style="margin-left: auto; margin-right: auto; width: 30em; text-align: center;"> 
        This project is aimed to showcase a various set of programming languages and apps working together in unison.
        Relying off a LAMP (Linux, Apache, MYSQL, & PHP) stack, this autonomous application can continue populating
        its database on its own, and giving a local user access to any record via the website. This app also relies off 
        Python for webscraping the necessary data and converting the data into graphs using MatPlotLib. This application 
        can also be expanded upon to use Flask in order to reduce strain on the database and have the graphs be created 
        when the site is visited.
    </h4>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>