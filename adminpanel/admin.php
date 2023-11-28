<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel | SubuWorks</title>
    <!-- Material CDN -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <?php
        if(!isset($_SESSION['adminEmail']))
        {
            $_SESSION['alertMessage'] = "Only admin can access this page, Please login as an Admin!";
            $_SESSION['alertType'] = "warning";
            header("Location: ../index.php");
            return;
        }
  ?>
    <div class="container">
      <aside>
        <div class="top">
          <div class="logo">
            <a href="../index.php">
              <!-- <img src="../assets/imgs/companylogo.png" /> -->
              <!-- <img src="../assets/imgs/shahi-xchange-logo.png" /> -->
              <img src="./images/logo.png" />
              <h2>Shahi<span class="danger">XChange</span></h2>
            </a>
          </div>
          <div class="close" id="close-btn">
            <i class="material-icons-sharp">close</i>
          </div>
        </div>
        <div class="sidebar">
          <a href="../changeratesfolder/changeservicerates.php">
            <i class="material-icons-sharp">paid</i>
            <h3>Change Service Rates</h3>
          </a>
          <a href="../contactqueriesfolder/checkcontactrequests.php">
            <i class="material-icons-sharp">perm_phone_msg</i>
            <h3>Contact Queries</h3>
          </a>
          <a href="../bookingqueriesfolder/checkbookingrequests.php">
            <i class="material-icons-sharp">receipt_long</i>
            <h3>Booking Queries</h3>
          </a>
          <a href="../registeredusersfolder/viewregisteredusers.php">
            <i class="material-icons-sharp">person</i>
            <h3>View Registered Users</h3>
          </a>
          <a href="../companyearningsfolder/viewcompanyearnings.php">
            <i class="material-icons-sharp">currency_rupee</i>
            <h3>Company Earnings</h3>
          </a>
          <a href="../logout.php?action=logoutAdmin">
            <i class="material-icons-sharp">logout</i>
            <h3>Logout</h3>
          </a>
        </div>
      </aside>

      <!----------------------------END OF ASIDE----------------------------->

      <main>
        <div class="insights">
          <div class="platform-fees">
            <a href="../changeratesfolder/changeservicerates.php">
              <i class="material-icons-sharp">paid</i>
              <div class="middle">
                <div class="left">
                  <h3>Change Service Rates</h3>
                </div>
              </div>
            </a>
          </div>

          <!-------------------------END OF PLATFORM FEES------------------------>
          <div class="contact-page">
            <a href="../contactqueriesfolder/checkcontactrequests.php">
              <i class="material-icons-sharp">perm_phone_msg</i>
              <div class="middle">
                <div class="left">
                  <h3>Contact Queries</h3>
                </div>
              </div>
            </a>
          </div>
          <!-------------------------END OF CONTACT PAGE------------------------>
          <div class="booking-form">
            <a href="../bookingqueriesfolder/checkbookingrequests.php">
              <i class="material-icons-sharp">receipt_long</i>
              <div class="middle">
                <div class="left">
                  <h3>Booking Queries</h3>
                </div>
              </div>
            </a>
          </div>
          <!-------------------------END OF BOOKING FORM------------------------>
          <div class="register-user">
            <a href="../registeredusersfolder/viewregisteredusers.php">
              <i class="material-icons-sharp">person</i>
              <div class="middle">
                <div class="left">
                  <h3>Registered Users</h3>
                </div>
                <!-- <div class="users">
                  <p>10</p>
                </div> -->
              </div>
            </a>
          </div>
          <!-------------------------END OF REGISTER USER------------------------>
          <div class="income">
            <a href="../companyearningsfolder/viewcompanyearnings.php">
              <i class="material-icons-sharp">currency_rupee</i>
              <div class="middle">
                <div class="left">
                  <h3>View Company Earnings</h3>
                </div>
                <!-- <div class="progress">
                  <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                  </svg>
                  <div class="number">
                    <p>44%</p>
                  </div>
                </div> -->
              </div>
              <!-- <small class="text-muted">Last 24 Hours</small> -->
            </a>
          </div>
          <!-------------------------END OF INCOME------------------------>
        </div>
        <!--------------------------END OF INSIGHTS-------------------------->
      </main>

      <!------------------------------- END OF MAIN ----------------------------------->

      <div class="right">
        <div class="top">
          <button id="menu_btn">
            <i class="material-icons-sharp">menu</i>
          </button>
          <div class="theme-toggler">
            <i class="material-icons-sharp active">light_mode</i>
            <i class="material-icons-sharp">dark_mode</i>
          </div>
          <div class="profile">
            <div class="info">
              <p>Hey ,<b><?php echo $_SESSION['adminEmail']; ?></b></p>
              <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
              <img src="images/profile-1.jpg" />
            </div>
          </div>
        </div>
        <!--------------------------------- END OF TOP ------------------------------------------->
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
