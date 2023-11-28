<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Currency Transaction | SubuWorks</title>
    <!-- Material CDN -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <?php
        if(!isset($_SESSION['userEmail']))
        {
            $_SESSION['alertMessage'] = "Please login first!";
            $_SESSION['alertType'] = "warning";
            header("Location: ../index.php");
            return;
        }
  ?>
    <div class="container">
    <aside>
        <div class="top">
          <div class="logo">
            <a href="../welcomefolder/welcome.php">
              <img src="images/logo.png" />
              <h2>Shahi<span class="danger">XChange</span></h2>
            </a>
          </div>
          <div class="close" id="close-btn">
            <i class="material-icons-sharp">close</i>
          </div>
        </div>
        <div class="sidebar">
          <a href="../contactformfolder/contactformpage.php">
            <i class="material-icons-sharp">perm_phone_msg</i>
            <h3>Contact Form</h3>
          </a>
          <a href="../bookingfolder/booking.php">
            <i class="material-icons-sharp">list_alt</i>
            <h3>Booking Form</h3>
          </a>
          <a href="../transferfolder/transfer.php">
            <i class="material-icons-sharp">currency_rupee</i>
            <h3>Transfer Money</h3>
          </a>
          <a href="../viewtransactionfolder/transactions.php">
            <i class="material-icons-sharp">sync_alt</i>
            <h3>View Transactions</h3>
          </a>
          <a href="../viewcontactfolder/ourcontactrequests.php">
            <i class="material-icons-sharp">preview</i>
            <h3>View Contact Request</h3>
          </a>
          <a href="../viewbookingfolder/ourbookingrequests.php">
            <i class="material-icons-sharp">inventory</i>
            <h3>View Booking Request</h3>
          </a>
          <a href="../logout.php?action=logoutUser">
            <i class="material-icons-sharp">logout</i>
            <h3>Logout</h3>
          </a>
        </div>
      </aside>

      <!----------------------------END OF ASIDE----------------------------->

      <main>
        <div class="transaction-wrapper">
          <h2>Money Transfer</h2>

          <div class="transaction-input">
            <form action="../operations.php" method="post">
              <div class="receiver-transaction">
                <div class="receiver-email">
                  <p>Receiver's Email</p>
                  <div class="form-control">
                    <input
                      type="email"
                      name="receiverEmail"
                      id="receiverEmail"
                      placeholder="Enter Receiver's Email"
                    />
                  </div>
                </div>
                <div class="receiver-amount">
                  <p>Amount to Send</p>
                  <div class="form-control">
                    <input
                      type="number"
                      name="amountSent"
                      id="amountSent"
                      placeholder="Enter Amount"
                    />
                  </div>
                </div>
                <input type="text" id="convertedAmount" name="convertedAmount" hidden>
              </div>
              <button id='convertMoney'>Click this button before sending the money</button>
              <br><br>
              <button type="submit" id='transferMoney' name='transfer'>Send Money</button>
            </form>
          </div>
        </div>
      </main>

      <!------------------------------- END OF MAIN ----------------------------------->

      <div class="right">
        <div class="top">
          <button id="menu_btn">
            <i class="material-icons-sharp">menu</i>
          </button>
          <!-- <div class="theme-toggler">
            <i class="material-icons-sharp active">light_mode</i>
            <i class="material-icons-sharp">dark_mode</i>
          </div> -->
          <div class="profile">
            <div class="info">
              <p>Hey ,<b><?php echo $_SESSION['userEmail']; ?></b></p>
            </div>
            <div class="profile-photo">
              <img src="images/profile-1.jpg" />
            </div>
          </div>
        </div>
        <!--------------------------------- END OF TOP ------------------------------------------->

        <!------------------------- END OF RECENT UPDATES ---------------------------->
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
