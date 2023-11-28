<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking Form | SubuWorks</title>
    <!-- Material CDN -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
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
        <div class="booking-details">
          <div class="form-side">
            <form class="my-form" action="../operations.php" method="post">
              <h2>Booking Form</h2>
              <div class="text-field">
                <label for="userName"
                  >Username :
                  <input
                    type="text"
                    name="userName"
                    id="userName"
                    placeholder="Enter Your Username"
                  />
                  <img src="resource/profile.webp" alt="userName" />
                </label>
              </div>
              <div class="text-field">
                <label for="userEmail"
                  >Email :
                  <input
                    type="email"
                    name="userEmail"
                    id="userEmail"
                    placeholder="Enter Your Email"
                    readonly 
                    value="<?php echo $_SESSION['userEmail']; ?>"
                  />
                  <img src="resource/email.svg" alt="userEmail" />
                </label>
              </div>
              <div class="text-field">
                <label for="userContact"
                  >Contact No. :
                  <input
                    type="number"
                    name="userContact"
                    id="userContact"
                    placeholder="Enter Your Contact No."
                  />
                  <img src="resource/phone.jpg" alt="userContact" />
                </label>
              </div>
              <div class="text-field">
                <label for="userAddress"
                  >Address :
                  <input
                    type="text"
                    name="userAddress"
                    id="userAddress"
                    placeholder="Enter Your Address"
                  />
                  <img src="resource/address.png" alt="userAddress" />
                </label>
              </div>
              <div class="text-field">
                <label for="requestDate"
                  >Requested Date
                  <input type="date" name="requestDate" id="requestDate" />
                </label>
              </div>
              <div class="text-field">
                <label for="requiredCurrency"
                  >Requested Currency :
                  <select name="requiredCurrency" id="requiredCurrency">
                    <option value="">Select Your Currency</option>
                    <option value="INR">Indian Rupees</option>
                    <option value="USD">United States Dollar</option>
                    <option value="NZD">New Zealand Dollar</option>
                    <option value="CAD">Canadian Dollar</option>
                    <option value="JPY">Japan Yen</option>
                  </select>
                </label>
              </div>
              <div class="text-field">
                <label for="requiredAmount"
                  >Requested Amount :
                  <input
                    type="number"
                    name="requiredAmount"
                    id="requiredAmount"
                    placeholder="Enter Your Amount"
                  />
                  <img src="resource/rupees.jpeg" alt="requiredAmount" />
                </label>
              </div>
              <button type="submit" class="my-form__button" name='booking'>Book Now!!</button>
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
  </body>
</html>
