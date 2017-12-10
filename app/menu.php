<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="http://localhost:8080/final-course/app/index.php">TH Computer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="http://localhost:8080/final-course/app/index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li><li class="nav-item">
              <a class="nav-link" href="dangki.php">Đăng kí</a>
            </li>
             <?php if(isset($_SESSION["login"])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8080/final-course/app/admin/index.php">Admin Panel</a>
            </li>
            <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>