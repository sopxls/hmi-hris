<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial scale=1.0">
    <title> HEALTH METRICS, INC. </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Markazi+Text:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
    />
  </head>
  <body>
    <div class="container">
      <div class="index-left">
        <div class="index-logo-container">
        <img src="logo.png" alt="HRIS Logo" class="index-logo">
        <p class="logo-text"> YOUR PARTNER IN HEALTH </p>
        </div>
      </div>
      <div class="index-right">
        <div class="index-right-content">
        <p class="welcome-text"> HELLO, <br> Welcome! </p>
        <div class="login-form-container">
          <form action="login.php" method="POST">
          <?php if(isset($_GET['error'])) { ?>
              <p class="error"> <?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="login-form-group">
            <label for="username"> USERNAME </label>
              <input type="text" id="username" name="username" placeholder="Enter Username">
            </div>
            <div class="login-form-group">
              <label for="password"> PASSWORD </label>
                <input type="password" id="password" name="password" placeholder="Enter Password">
            </div>
            <div class="forgot">
              <p><a href="forgot_pass.php"> Forgot Password? </a></p>
          </div>
            <button type="submit" class="login-form-btn"> LOGIN </button>
          </form>
          </div>
        </div>
        </h2>
      </div>
    </div>
    <footer class="index-footer">
      <p> info@healthmetrics.com.ph <br>
      1157 Chino Roces Ave., Makati, 1203 Metro Manila</p>
    </footer>
    <script src="scripts.js"></script>
  </body>
</html>
