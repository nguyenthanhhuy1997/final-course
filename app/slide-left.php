<div class="col-lg-3">
  <h4 class="my-4"><a href="index.php"> <img src="../public/uploads/logo.png" style="width:260px" height="170px" ;></a></h4>
  <div class="list-group">
    <?php
        $sql = "select * from catalogs ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) { ?>
              <b><a  style="border-radius: 20px; background-color: yellow; border-color: #3366CC; border-width: 2px; border: outset;" href="catalogs.php?catalog_id=<?php echo $row["id"]; ?>"
                class="list-group-item"><?php echo $row["name"]; ?></a></b>
          <?php   }
        }
      ?>
  </div>
</div>

