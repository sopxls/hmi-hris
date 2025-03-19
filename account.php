<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ACCOUNT</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="account-page-header">
      <div class="account-header-left">
        <button class="back-btn">
          <i class="bi bi-arrow-left-circle"></i> BACK
        </button>
      </div>
      <div class="account-header-center">
        <img src="logo.png" alt="Logo" class="page-logo" />
</div>
</div>

<div class="setting-container">
  <div class="setting-form">
  <h2>ACCOUNT SETTINGS</h2> 
  <p>CHANGE PASSWORD<hr></p>
  <?php if(isset($_GET['error'])) { ?>
              <p class="error"> <?php echo $_GET['error']; ?></p>
            <?php } ?>
  <form name="chngpwd" action="settings.php" method="POST">
    <label for="current">CURRENT PASSWORD</label>
    <input type="password" id="oldPass" name="oldPass" placeholder="Enter Current Password" required="">

    <label for="new">NEW PASSWORD</label>
    <input type="password" id="newPass" name="newPass" placeholder="Enter New Password" required="">

    <label for="confirm">CONFIRM PASSWORD</label>
    <input type="password" id="confirmPass" name="confirmPass" placeholder="Confirm Password" required="">
  
    <button type="save" name="save" class="submit-form-btn"> SUBMIT </button>
  </form>
</div>
</div>
<script src="scripts.js"></script>
</body>
</html>


