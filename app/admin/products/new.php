<?php require_once "../../../db/mysql.php"; ?>
<?php require_once "../../check-login.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tạo mới sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/custom.css">
  </head>
  <body>
  <?php include "../../menucon.php" ?>
  <div class="wrapper">
    <form method="post" action="create.php">
      <div class="row">
        <i class="flash"><?php if(isset($_SESSION["flash"])) echo $_SESSION["flash"]; ?></i>
      </div>
      <div>
        <h1>Tạo mới</h1>
      </div>
      <div class="row">
        <label>Tên sản phẩm:</label>
        <input class="form-control" type="text" name="name">
      </div>
      <div class="row">
        <label>Ảnh sản phẩm:</label>
        <input class="form-control"  type="text" name="image">
      </div>
      <div class="row">
        <label>Mô tả sản phẩm:</label>
        <textarea class="form-control" name="description"></textarea>
      </div>
      <div class="row">
        <label>Số lượng:</label>
        <input class="form-control"  type="text" name="qty">
      </div>
      <div class="row">
        <label>Giá sản phẩm:</label>
        <input class="form-control"  type="text" name="price">
      </div>
      <div class="row">
        <label>Danh mục:</label>
        <select class="form-control" name="catalog_id">
          <?php
            $sql = "select * from catalogs";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){ ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
          <?php    }
            }
          ?>
        </select>
      </div>
      <br>
      <div class="row">
        <button class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <script src="../../../public/js/jquery.min.js"></script>
  <script src="../../../public/js/bootstrap.min.js"></script>
  <script src="../../../public/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php unset($_SESSION["flash"]); ?>
