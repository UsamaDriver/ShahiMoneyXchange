<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Platform Fees | SubuWorks</title>
    <link rel="stylesheet" href="changeservicerates.css" />
  </head>
  <body>
  <?php
        if(!isset($_SESSION['adminEmail']))
        {
            $_SESSION['alertMessage'] = "Only admin can access this page, Please login as an Admin!";
            $_SESSION['alertType'] = "warning";
            header("Location: ../index.php");
            // return;
        }

  ?>
    <div class="platformFees-wrapper">
      <h2>Change Service Rates</h2>

      <div class="platformFees-input">
        <form action="../operations.php" method="post">
          <div class="platform-fees">
            <div class="fees">
              <p>Platform Fees (%)</p>
              <div class="form-control">
                <input
                  type="number"
                  name="platformFees"
                  id="platformFees"
                  placeholder="Enter Platform Fees"
                />
              </div>
            </div>
            <div class="gst">
              <p>GST (%)</p>
              <div class="form-control">
                <input
                  type="number"
                  name="gst"
                  id="gst"
                  placeholder="Enter GST"
                />
              </div>
            </div>
          </div>
          <button type="submit" name='changerates'>Change Rates</button>
        </form>
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
