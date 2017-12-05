<?php require_once "../../../db/mysql.php"; ?>
<?php require_once "../../check-login.php"; ?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
  <title>Danh sách người dùng</title>
   <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/custom.css">
</head>
<body>
<?php include "../../menucon.php" ?>
  <div class="container">
  <h2>Danh sách</h2>
  <div class="row">
        <i class="flash"><?php if(isset($_SESSION["flash"])) echo $_SESSION["flash"]; ?></i>
      </div>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    		$sql = "select * from users";
    		$result = $conn->query($sql);
    		if ($result->num_rows > 0) {
    			while ($row = $result->fetch_assoc()) { ?>
    				<tr>
    					<td><?php echo $row["name"]; ?></td>
    					<td><?php echo $row["email"]; ?></td>
    					<td><?php switch ($row["role"]) {
    						case 0:
    							echo "Admin";
    							break;
    						case 1:
    							echo "Editor";
    							break;
    						case 2:
    							echo "User";
    							break;
    					}; ?>
    					<td><a href="edit.php?id=<?php echo $row["id"];?>">Edit</a></td>
    					<td><a href="delete.php?id=<?php echo $row["id"];?>">Delete</a></td>
    				</tr>
		<?php   }
    		}
    	?>
    </tbody>
  </table>
</div>
<script src="../../../public/js/jquery.min.js"></script>
  <script src="../../../public/js/bootstrap.min.js"></script>
  <script src="../../../public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
