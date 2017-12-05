<?php session_start(); ?>
<?php
  define("URL_SITE", "http://localhost:8080/final-course/app/");
?>
<?php
  if (!isset($_SESSION["login"])) {
      $_SESSION["flash"] = "Yêu cầu đăng nhập";
      header("location: ".URL_SITE."index.php");
  }
?>
