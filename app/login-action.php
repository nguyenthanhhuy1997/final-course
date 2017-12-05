<?php session_start(); ?>
<?php require_once "../db/mysql.php"; ?>
<?php
  if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "select * from users where email ='$email' and password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
      $row = $result->fetch_assoc();
      $_SESSION["login"] = true;
      $_SESSION["userid"] = $row["id"];
    }
    else {
      $_SESSION["flash"] = "failed login";
    }

    header("location: index.php");
  }
?>
