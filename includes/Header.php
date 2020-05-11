
      <?php include("index.php")?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="Dashboard.php">Snackradar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="Message.php">Messages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Matches.php">Matches</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="statistics.php">Statistics</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
         <a href="http://localhost/client/config/logout.php" class ="my-2 my-sm-0" style="text-decoration:none" name= "log-out">Log out</a>
           
        </form>
      </div>
    </nav>
   