<?php
    session_start();
    include('../dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking Form Queries | SubuWorks</title>
    <!-- Material CDN -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="booking-form.css" />
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
        <div class="table-widget">
          <span class="caption-container">
            <span class="table-title">
              <svg
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
                xmls="https://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M11.6775 1.3486C10.9695 2.1636 10.6875 7.2886 11.5105 8.1126C12.3335 8.9346 17.2785 8.5186 18.4665 7.5836C21.3245 5.3326 13.9375 -1.2534 11.6775 1.3486Z"
                  stroke="#272727"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M16.1372 11.79C17.2212 12.874 14.3472 19.054 8.65122 19.054C4.39722 19.054 0.949219 15.606 0.949219 11.353C0.949219 6.053 6.17822 2.663 7.67722 4.162C8.54022 5.025 7.56822 9.086 9.11622 10.635C10.6642 12.184 15.0532 10.706 16.1372 11.79Z"
                  stroke="#272727"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              Booking Form
            </span>
          </span>
          <div class="table-wrapper">
            <!-- generate table here -->
            
            <table>
              <thead>
              <tr>
                  <th class="sticky-left"Ticker>Name</th>
                  <th>Email</th>
                  <th>Contact No.</th>
                  <th>Address</th>
                  <th>Requested Currency</th>
                  <th>Requested Amount</th>
                  <th>Requested Date</th>
                  <th class="sticky-right">Status</th>
              </tr>
              </thead>
              <tbody id="table-row">
              <?php
                  $dbobj = new connectDB();
                  $result= $dbobj->getBookingRequest($_SESSION['userEmail']);
                  while ($rec= mysqli_fetch_row($result))
                  {
                      echo "
                      <tr>
          <td class='stock sticky-left'>
              <div class='stock-wrapper'>
                  <div class='stock-info'>
                      <span class='stock-info__name'>
                          $rec[2]
                      </span>
                  </div>
              </div>
          </td>
          <td> $rec[1] </td>
          <td>
          $rec[3]
          </td>
          <td>
          $rec[4]
          </td>
          <td>
          $rec[6]
          </td>
          <td>
          $rec[7]
          </td>
          <td >
          $rec[5]
          </td>
          <td class='sticky-right'>
          ";
          if($rec[8]=='0')
          {
              echo "Unattended";
          } 
          else
          {
              echo "Attended";
          }
          "</td>
      </tr>
                      ";

                  }
                  if (mysqli_num_rows($result)===0)
                  {
                  echo "
                    <tr>
                      <td colspan='8'>No Records Found</td>
                    </tr>";
                  }
              ?>
              </tbody>
            </table>

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
