<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <!-- navbar title -->
  <a class="navbar-brand" href="index.php">Data Tutorial</a>

  <!-- collapsed navbar button -->
  <button class="navbar-toggler collapsenav" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- navbar div and items that also get collapsed -->
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item <?php echo $index ?>">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php echo $viewrecords ?>">
        <a class="nav-link" href="viewrecords.php">View Attendees</a>
      </li>

    </ul>
    <!-- login/logout button -->
    <ul class="navbar-nav" id="navitemslist">

      <?php
      if (!isset($_SESSION["userid"])) {
      ?>
        <li class="nav-item <?php echo $login ?>">
          <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
        </li>

      <?php
      } else {
      ?>
        <li class="nav-item active">
        <a class="nav-link" href="#"><span>Hello <?php echo $_SESSION["username"] ?></span></a>
        </li>
        <li class="nav-item <?php echo $login ?>">
          <a class="nav-link" href="logout.php">Log Out <span class="sr-only">(current)</span></a>
        </li>

      <?php
      }
      ?>

    </ul>
  </div>
  <!--  -->

</nav>