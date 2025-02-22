<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> 
    <link rel="stylesheet" href="loginstyle.css">
    <script src="https://kit.fontawesome.com/542cb8b844.js"></script>
   </head>
<body>
  <div class="container">
    <div class="login form">
      <header>Login</header>
      <form action="login.php" method="post">

        <?php if(isset($_GET['error'])) {?>
          <p class="error"><?php echo $_GET ['error'];?></p>
       <?php } ?>
        <label for="username"></label>
        <input type="text" name="username"  placeholder="Enter your username">
        <label for="password"></label>
        <input  type="password" name="password"  placeholder="Enter your password">
        <a href="#">Forgot Password?</a>
        <button type="submit">login</button>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?</span>
        <label for="check"></label>
        <a id="check" href="#">Sign Up</a>
      </div>
    </div>
  </div>
</body>
</html>