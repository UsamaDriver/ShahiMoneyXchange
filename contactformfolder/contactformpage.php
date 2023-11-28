<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form | SubuWorks</title>
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
        <div class="contact-details">
          <div class="form-side">
            <form action="../operations.php" method="post" class="my-form">
              <h2>Contact Form</h2>
              <div class="text-field">
                <label for="contName"
                  >Name :
                  <input
                    type="text"
                    name="contName"
                    id="contName"
                    placeholder="Enter Your Name"
                  />
                  <img src="resource/profile.webp" alt="name" />
                </label>
              </div>
              <div class="text-field">
                <label for="contEmail"
                  >Email :
                  <input
                    type="email"
                    name="contEmail"
                    id="contEmail"
                    placeholder="Enter Your Email"
                  />
                  <img src="resource/email.svg" alt="email" />
                </label>
              </div>
              <div class="text-field">
                <label for="contPhone"
                  >Contact No. :
                  <input
                    type="number"
                    name="contPhone"
                    id="contPhone"
                    placeholder="Enter Your Contact No."
                  />
                  <img src="resource/phone.jpg" alt="contact" />
                </label>
              </div>
              <div class="text-field">
                <label for="contSubject"
                  >Subject :
                  <input
                    type="text"
                    name="contSubject"
                    id="contSubject"
                    placeholder="Enter Your subject"
                  />
                  <img src="resource/text.png" alt="subject" />
                </label>
              </div>
              <div class="text-field">
                <label for="contMessage"
                  >Message :
                  <input
                    type="text"
                    name="contMessage"
                    id="contMessage"
                    placeholder="Enter Your message"
                  />
                  <img src="resource/mail.png" alt="message" />
                </label>
              </div>
              <button type="submit" name='contact' class="my-form__button">Send message</button>
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
              <p>Hey ,<b>
                <?php 
                  if(isset($_SESSION['userEmail']))
                  {
                    echo $_SESSION['userEmail'];
                  } 
                ?>
              </b></p>
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
