<?php session_start(); ?>
<?php require_once "../db/mysql.php"; ?>
<?php
  define("URL_IMAGE", "http://localhost:8080/final-course/public/uploads/");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Trang chủ</title>
    <?php include "lib.php"; ?>
  </head>
  <body>

    <!-- Navigation -->
    <?php include "menu.php" ?>

    <!-- Page Content -->
    <div style="background-color: #BBBBBB">
    <div class="container">
      <div class="row">
        <i class="flash"><?php if(isset($_SESSION["flash"])) echo $_SESSION["flash"]; ?>
        </i>
      </div>
      <div class="row">

        <?php include "slide-left.php" ?>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
          <?php include "slide.php"?>
          
          <div class="row"> 
          <?php
                // $sql = "select * from products";
                // $result = $conn->query($sql);
            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            $result = mysqli_query($conn, 'select count(id) as total from products');
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];

            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 9;

            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
            // tổng số trang
            $total_page = ceil($total_records / $limit);

            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }

            // Tìm Start
            $start = ($current_page - 1) * $limit;

            // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $result = mysqli_query($conn, "SELECT * FROM products LIMIT $start, $limit");
            while($row = mysqli_fetch_assoc($result)) {?>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="single.php?id=<?php echo $row["id"]; ?>"><img class="card-img-top" src="<?php echo URL_IMAGE.$row['image'];?>" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <center><a href="#"><?php echo $row["name"];?></a></center>
                    </h4>
                    <center><h5>Giá: <?php echo $row["price"];?> VNĐ</h5></center>
                    <p class="card-text" style="text-overflow: ellipsis;overflow: hidden; white-space: nowrap;"><?php echo $row["description"];?><a href=""> ...</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                  </div>
                </div>
              </div>
              <?php  }

          ?>

          </div>
          <!-- /.row -->
        <nav aria-label="Page navigation example">
          <ul class="pagination">
          <?php
            if ($current_page > 1 && $total_page > 1){ ?>
            <li class="page-item">
              <a class="page-link" href="index.php?page=<?php echo ($current_page-1); ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span>Previous</span>
              </a>
            </li>
            <?php } ?>

            <?php for ($i = 1; $i <= $total_page; $i++){
              if ($i == $current_page){ ?>
                <li class="page-item-active"><a class="page-link" style="background-color: #7CFC00" href=""><?php echo $i; ?></a></li>
              <?php }else{ ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
                }
              }
            ?>
          <?php if ($current_page < $total_page && $total_page > 1){ ?>
            <li class="page-item">
              <a class="page-link" href="index.php?page=<?php echo ($current_page+1); ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span>Next</span>
              </a>
            </li>
          <?php } ?>
          </ul>
        </nav>  
        </div>  
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
</div> 
    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
  </body>

</html>
<?php unset($_SESSION["flash"]); ?>
