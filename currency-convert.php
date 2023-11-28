<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Currency Rates | Shahi-XChange</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link rel="stylesheet" href="./css/convertstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Navbar (Usama) -->
  <header class="navheader">
    <a href="./index.php" class="logo">Shahi-XChange</a>
    <input type="checkbox" id="menucheck">
    <label for="menucheck" class="navicons">
      <i class="bx bx-menu" id="menu-icon"></i>
      <i class="bx bx-x" id="close-icon"></i>
    </label>
    <nav class="mynavbar">
      <a href="./currency-convert.php" style="--i:0;">Convert Now</a>
      <a href="./currency-convert.php" style="--i:0;">Live Rates</a>
      <a href="./index.php#section-contactus" style="--i:3;">Contact</a>

      <?php
        if(!isset($_SESSION['userEmail']))
        {
          echo "<a href='./login.php' style='--i:3;'>Login/Register</a>";
        }
        else 
        {
          echo "<a href='./welcome.php' style='--i:3;'>Dashboard</a>";
          echo "<a href='./transfer.php' style='--i:3;'>Transfer Money</a>";
          echo "<a href='./logout.php' style='--i:3;'>Logout</a>";
        }
      ?>

    </nav>
  </header>


    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h2 class="text-white myHeading">
                    <!-- Real-Time Currency Rates : Unlock 150+ Markets and Visualize Currency Trends -->
                    Instant Currency Conversion: Seamlessly Calculate and Compare Exchange Rates
                </h2>
                <p class="text-white myDesc">
                    Convert currency rates in a single tap
                </p>

                <div class="wrapper">
                    <header>Currency Exchange</header>
                    <form action="#">
                        <div class="amount">
                            <p>Enter Amount</p>
                            <input type="text" value="1" />
                        </div>
                        <div class="drop-list">
                            <div class="from">
                                <p>From</p>
                                <div class="select-box">
                                    <img src="https://flagsapi.com/US/flat/64.png" alt="flag" />
                                    <select>
                                        <!-- <option value="USD">USD</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="icon"><i class="fas fa-exchange-alt"></i></div>
                            <div class="to">
                                <p>To</p>
                                <div class="select-box">
                                    <img src="https://flagsapi.com/IN/flat/64.png" alt="flag" />
                                    <select>
                                        <!-- <option value="USD">USD</option> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="exchange-rate">Getting exchange rate...</div>
                        <button id="submitbtn">Get Exchange Rate</button>
                    </form>
                </div>
                <script src="js/country-list.js"></script>
                <script src="js/convert.js"></script>

                <!-- <div class="dropdown myDropdown">
                    <button class="btn btn-lg bg-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select a country
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-item">
                            <img src="./assets/icons/flag-india.png" width="20" height="20"> India (INR)
                        </li>
                        <li class="dropdown-item">
                            <img src="./assets/icons/flag-usa.png" width="20" height="20"> USA (USD)
                        </li>
                        <li class="dropdown-item">
                            <img src="./assets/icons/flag-uae.png" width="20" height="20"> Dubai (AED)
                        </li>
                    </ul>
                </div> -->

                <!-- <table class="table table-success table-bordered mt-5">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">NO.</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>Larry</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table> -->

            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <!-- Footer (Usama) -->
    <footer class="footer bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Contact Us</h4>
                    <p>Email: example@example.com</p>
                    <p>Phone: +1 (123) 456-7890</p>
                </div>
                <div class="col-md-6">
                    <h4>Follow Us</h4>
                    <a href="#" class="text-white">Facebook</a><br>
                    <a href="#" class="text-white">Twitter</a><br>
                    <a href="#" class="text-white">Instagram</a><br>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>