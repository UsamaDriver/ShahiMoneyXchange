<?php
    session_start();
    include('../dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Company's Earnings | SubuWorks</title>
    <link rel="stylesheet" href="earnings.css" />
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
    <div class="earnings-wrapper">
      <h2>Company's Earnings</h2>

      <div class="earnings-table">
        <table>
          <thead>
            <th>Total Platform Fees</th>
            <th>Total GST</th>
          </thead>
          <tbody>
          <?php
              $dbobj = new connectDB();
              $result= $dbobj->viewCompanyEarnings();
              while ($rec= mysqli_fetch_row($result))
              {
                  echo "
                  <tr>
                      <td>$rec[0]</td>
                      <td>$rec[1]</td>
                  </tr>";
              }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
