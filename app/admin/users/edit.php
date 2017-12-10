<?php require_once "../../../db/mysql.php"; ?>
<?php require_once "../../check-login.php"; ?>
<?php
  if(!isset($_GET["id"])){
    $_SESSION["flash"] = "Wrong params";
    header("location: index.php");
  }

  $id = $_GET["id"];
  $sql = "select * from users where id='$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $name = $row["name"];
  $email = $row["email"];
  $role = $row["role"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Chỉnh sửa user</title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/custom.css">
  </head>
  <body style="background-color: #EEFF41">
  <?php include "../../menucon.php" ?>
  <div class="wrapper">
    <form method="post" action="update.php">
      <input type="hidden" value="<?php echo $id; ?>" name="id">
      <div class="row">
        <i class="flash"><?php if(isset($_SESSION["flash"])) echo $_SESSION["flash"]; ?></i>
      </div>
      <br>
      <div>
        <center><h1>Chỉnh sửa</h1></center>
      </div>
      <div class="row">
        <label>Tên người dùng:</label>
        <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
      </div>
      <div class="row">
        <label>Email:</label>
        <input class="form-control"  type="email" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="row">
        <label>Mật khẩu:</label>
        <input class="form-control"  type="password" name="password">
      </div>
      <div class="row">
        <label>Lặp lại mật khẩu:</label>
        <input class="form-control"  type="password" name="repassword">
      </div>
      <div class="row">
        <label>Quyền:</label>
        <select class="form-control" name="role">
          <option <?php if($role ==  2) echo "selected='true'"; ?> value="2">User</option>
          <option <?php if($role ==  1) echo "selected='true'"; ?> value="1">Editor</option>
          <option <?php if($role ==  0) echo "selected='true'"; ?> value="0">Admin</option>
        </select>
      </div>
      <br>
      <div>
        <center><button class="btn btn-primary" style="border-radius: 20px;background-color: red;border-color: red;border: outset;">Submit</button></center>
      </div>
    </form>
  </div>
  <script src="../../../public/js/jquery.min.js"></script>
  <script src="../../../public/js/bootstrap.min.js"></script>
  <script src="../../../public/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php unset($_SESSION["flash"]); ?>
