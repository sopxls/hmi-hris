<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOME</title>
    <link rel="stylesheet" href="dashboard.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"/>
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body,
  html {
    height: 100%;
    font-family: "Inter", sans-serif;
    background-color: white;
  }
/* DASHBOARD - NAVBAR */
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: white;
    padding: 10px 20px;
    border-bottom: 3px solid #6d2323;
    font-family: "Inter", sans-serif;
  }
  .navbar .logo {
    height: 40px;
    width: auto;
  }
  .nav-links {
    display: flex;
    gap: 20px;
  }
  .nav-links a {
    text-decoration: none;
    color: #6d2323;
    font-weight: bold;
    font-size: 16px;
    padding: 10px 15px;
    transition: 0.3s ease-in-out;
  }
  .nav-links a:hover {
    background-color: #6d2323;
    color: white;
    border-radius: 10px;
  }
  .nav-links a,
  .dropdown {
    display: flex;
    align-items: center;
    padding: 5px 5px;
    text-decoration: none;
    color: #6d2323;
    font-weight: bold;
    font-size: 16px;
    transition: 0.3s ease-in-out;
    cursor: pointer;
  }
  /* DASHBOARD - DEPT DROPDOWN MENU */
  .dropdown {
    position: relative;
  }
  .dropdown > a {
    display: flex;
    align-items: center;
    height: 100%;
  }
  .dropdown-menu {
    display: none;
    position: absolute;
    left: 0;
    top: 100%;
    background-color: white;
    min-width: 200px;
    border-radius: 5px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    padding: 5px 0;
    z-index: 10;
  }
  .dropdown-menu a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #6d2323;
    font-weight: bold;
    font-size: 14px;
    transition: 0.3s ease-in-out;
    white-space: nowrap;
  }
  .dropdown-menu a:hover {
    background-color: #9e213d;
    color: white;
    border-radius: 3px;
  }
  .dropdown:hover .dropdown-menu {
    display: block;
  }
  /* mission and vision */
  body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
  }
  h2 {
    font-size: 2rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #6d2323;
    margin-bottom: 1rem;
  }
  p {
    font-size: 1rem;
    line-height: 1.8;
    text-align: justify;
    color: #444;
  }
  .vision-container,
  .mission-container {
    background: white;
    border-left: 5px solid #6d2323;
    margin: 2rem auto;
    padding: 2rem;
    width: 90%;
    max-width: 800px;
    border-radius: 8px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  }
  .vision-content,
  .mission-content {
    text-align: center;
  }
  .vision-content h2,
  .mission-content h2 {
    font-weight: 700;
    margin-bottom: 0.5rem;
  }
  .vision-content p,
  .mission-content p {
    font-weight: 400;
    font-size: 1.1rem;
    color: black;
  }
  /* Hover effect */
  .vision-container:hover,
  .mission-container:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease-in-out;
  }
  /* Responsive adjustments */
  @media (max-width: 768px) {
    h2 {
      font-size: 1.5rem;
    }
    p {
      font-size: 1rem;
    }
    .vision-container,
    .mission-container {
      padding: 1.5rem;
    }
  }
  </style>
  </head>
  <body>
    <nav>
      <div class="navbar">
        <img src="logo.png" alt="Health Metrics Logo" class="logo" />
        <div class="nav-links">
          <a href="#">HOME</a>
          <div class="dropdown">
            <a href="#" class="nav-link">DEPARTMENTS</a>
            <div class="dropdown-menu">
              <a href="admin.php">Admin</a>
              <a href="ancillary.php">Ancillary Services</a>
              <a href="clinic.php">Clinic Management</a>
              <a href="customer.php">Customer Services</a>
              <a href="finance.php">Finance</a>
              <a href="humanResource.php" class="hr">Human Resources</a>
              <a href="imaging.php">Imaging</a>
              <a href="laboratory.php">Laboratory</a>
              <a href="medical.php">Medical Exam & Evaluation</a>
              <a href="nursing.php">Nursing</a>
              <a href="psychometry.php">Psychometry</a>
              <a href="records.php">Records</a>
              <a href="registration.php">Registration</a>
              <a href="sales.php">Sales</a>
            </div>
          </div>
          <a href="stats.php">STATISTICS</a>
          <div class="dropdown">
            <a href="#" class="nav-link">SETTINGS</a>
            <div class="dropdown-menu">
              <a href="account.php" class="account">Account</a>
              <a href="index.php" class="logout">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="vision-container">
      <div class="vision-content">
       <h2>VISION</h2>
        <p>To be the primary mover of the working men and women who move the world, 
          be it at home or abroad, on land, sea, or air by providing excellent 
          occupational health services & continuing preventive health care 
          through its world-class team of competent and compassionate medical service professionals.
        </p>
      </div>
    </div>
    <div class="mission-container">
      <div class="mission-content">
       <h2>MISSION</h2>
        <p>In full compliance with all medical guidelines and regulations set by national 
          and international certifying bodies, we are committed to provide complete, comprehensive 
          and excellent medical services that will ensure fitness to work on-board or on the 
          workplace and even outside the workplace. We accomplish this with compassion and 
          sensitivity to our clients’ needs so that we can have shared responsibility of maintaining 
          individual health, that then ensures community health which is a vital foothold in nation 
          building.
        </p>
      </div>
    </div>
    <script src="scripts.js"></script>
  </body>
</html>