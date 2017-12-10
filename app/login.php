<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/login.css" rel="stylesheet">
  </head>

  <body style="background-color: #EEFF41">

    <div class="container">

      <form class="form-signin" action="login-action.php" method="POST">
        <h2 class="form-signin-heading">Vui lòng đăng nhập</h2>
        <br>
        <label for="inputEmail" class="sr-only">Nhập Email</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Nhập Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Ghi nhớ đăng nhập
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" style="border-radius: 20px;background-color: red;border-color: red;border: outset;" type="submit">Đăng nhập</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>
