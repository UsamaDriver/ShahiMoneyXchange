<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Personal CSS -->
  <link rel="stylesheet" href="./css/indexstyle.css">

  <!-- AOS Animate -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- BOX Icons CSS -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>Home | Shahi-XChange</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- FontAwesome -->
  <!-- <script src="https://kit.fontawesome.com/cf3d242817.js" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

  <style>
    .alert, .alert-dismissible{
      z-index: 1000;
    }
  </style>
<body>

  <?php
    if (isset($_SESSION['alertMessage']) && isset($_SESSION['alertType']))
    {
        $alertMessage = $_SESSION['alertMessage'];
        $alertType = $_SESSION['alertType'];
        echo "
        <div class='alert alert-$alertType alert-dismissible fade show' role='alert'>
        <strong>$alertMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
      ";
      unset($_SESSION['alertMessage']);
      unset($_SESSION['alertType']);
    }
  ?>

  <!-- Navbar (Usama) -->
  <header class="navheader">
    <a href="./index.php" class="logo">Shahi-XChange</a>
    <input type="checkbox" id="menucheck">
    <label for="menucheck" class="navicons">
      <i class="bx bx-menu" id="menu-icon"></i>
      <i class="bx bx-x" id="close-icon"></i>
    </label>
    <nav class="mynavbar">
      <a href="./convertfolder/currency-convert.php" style="--i:0;">Convert Now</a>
      <a href="./liveratesfolder/liverates.php" style="--i:0;">Live Rates</a>
      <a href="./index.php#section-contactus" style="--i:3;">Contact</a>

      <?php
        if(!isset($_SESSION['userEmail']) && !isset($_SESSION['adminEmail']))
        {
          echo "<a href='./loginfolder/login.php' style='--i:3;'>Login/Register</a>";
        }
        elseif (isset($_SESSION['adminEmail']))
        {
          echo "<a href='./adminpanel/admin.php' style='--i:3;'>Admin Dashboard</a>";
          echo "<a href='logout.php?action=logoutAdmin' style='--i:3;'>Logout</a>"; 
        }
        elseif (isset($_SESSION['userEmail']))
        {
          echo "<a href='./welcomefolder/welcome.php' style='--i:3;'>Dashboard</a>";
          echo "<a href='./transferfolder/transfer.php' style='--i:3;'>Transfer Money</a>";
          echo "<a href='logout.php?action=logoutUser' style='--i:3;'>Logout</a>";
        }
      ?>

    </nav>
  </header>
  
  <!-- Hero Section (Sahid) -->
  <section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div class="copy" data-aos="fade-up" data-aos-duration="1500">
            <!-- <div class="text-label text-white">
                            Providing reliable currency exchange services globally since 25years
                        </div> -->
            <div class="text-hero-bold">
              XChange - Your Trusted Partner in Currency Exchange
            </div>
            <div class="text-hero-regular">
              Providing reliable currency exchange services globally since 15 years
            </div>
            <ul class="hero-all-features d-flex">
              <li class="hero-feature hero-feature1">
                <i class="fa-sharp fa-solid fa-circle-check" style="color: #00ffd5;"></i>
                Affordable
              </li>
              <li class="hero-feature">
                <i class="fa-sharp fa-solid fa-circle-check" style="color: #00ffd5;"></i>
                Reliable
              </li>
              <li class="hero-feature">
                <i class="fa-sharp fa-solid fa-circle-check" style="color: #00ffd5;"></i>
                Secure
              </li>
              <li class="hero-feature">
                <i class="fa-sharp fa-solid fa-circle-check" style="color: #00ffd5;"></i>
                Fast
              </li>

            </ul>
            <div class="cta">
              <a href="./convertfolder/currency-convert.php">
              <button class="btn-cta">
                XChange Now &DownArrow;
              </button>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-5" data-aos="fade-up" data-aos-duration="1500">
          <img src="./assets/imgs/hero-image.png" alt="DollarToEuroImg" class="heroImg">
        </div>
      </div>
    </div>
  </section>

  <!-- About US (Subrata) -->
  <section class="sec-page" id="section-aboutus">
    <div class="heading">
      <h1>About us</h1>
      <hr class="text-white text-center customHR">
    </div>
    <div class="containerabout">
      <div class="content">
        <h2>Welcome to Our Website</h2>
        <p>
        Welcome to our world of currency exchange. Explore, exchange, and experience seamless transactions with us.
        </p>
        <button class="cta-button">Learn More</button>
      </div>
      <div class="image imgsubbu">
        <img src="./assets/imgs/aboutus.jpg" alt="" />
      </div>
    </div>
  </section>

  <!-- Services Section (Sahid) -->
  <section class="services bg-dark p-1" id="section-services">

    <div class="container text-center">
      <h1 class="text-center text-white my-3 display-3 fw-medium">Our Services</h1>
      <hr class="text-white text-center customHR">
      <!-- <p class="text-center text-white">We provide great services to our clients</p> -->

      <!-- Row 1 Starts -->
      <div class="row my-3">
        <div class="col-12 col-sm-6 col-md-4 mx-auto my-3">
          <!-- Card Starts -->
          <div class="card border-0 text-center">
            <div class="card-body p-3">
              <img class="my-1 myIcon" src="./assets/icons/flaticon-exchanging.png" alt="">
              <!-- ICONS -->
              <h3 class="card-title my-3">Currency Exchange</h3>
              <p class="card-text my-3">
                Seamlessly exchange your currency for foreign money at competitive rates. We make currency exchange
                fast,
                easy,
                and reliable, so you can focus on your journey.
              </p>
              <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
            <!-- Card Body Ends -->
          </div>
          <!-- Card Ends -->
        </div>
        <!-- Col Ends -->
        <div class="col-12 col-sm-6 col-md-4 mx-auto my-3">
          <!-- Card Starts -->
          <div class="card border-0 text-center">
            <div class="card-body p-3">
              <img class="my-1 myIcon" src="./assets/icons/flaticon-reservation.png" alt="">
              <!-- ICONS -->
              <h3 class="my-3">Currency Reservations</h3>
              <p class="my-3">
                Plan ahead with confidence. Reserve your foreign currency before your trip, ensuring it's ready and
                waiting for you when you arrive
              </p>
            </div>
            <!-- Card Body Ends -->
          </div>
          <!-- Card Ends -->
        </div>
        <!-- Col Ends -->
        <div class="col-12 col-sm-6 col-md-4 mx-auto my-3">
          <!-- Card Starts -->
          <div class="card border-0 text-center">
            <div class="card-body p-3">
              <img class="my-1 myIcon" src="./assets/icons/flaticon-wiretransfer.png" alt="">
              <!-- ICONS -->
              <h3 class="my-3">Wire Transfers</h3>
              <p class="my-3">
                Experience secure and efficient international money transfers. Our service provides a cost-effective
                solution for sending funds across borders
              </p>
            </div>
            <!-- Card Body Ends -->
          </div>
          <!-- Card Ends -->
        </div>
        <!-- Col Ends -->
      </div>
      <!-- Row 1 Ends -->

      <!-- Row 2 starts -->
      <div class="row my-3">
        <div class="col-12 col-sm-6 col-md-4 mx-auto my-3">
          <!-- Card Starts -->
          <div class="card border-0 text-center">
            <div class="card-body p-3">
              <img class="my-1 myIcon" src="./assets/icons/flaticon-corporateservices.png" alt="">
              <!-- ICONS -->
              <h3 class="my-3">Corporate Services</h3>
              <p class="my-3">
                Empower your business with tailored solutions. Our corporate services include bulk currency exchange,
                payroll support, and risk management strategies
              </p>
            </div>
            <!-- Card Body Ends -->
          </div>
          <!-- Card Ends -->
        </div>
        <!-- Col Ends -->
        <div class="col-12 col-sm-6 col-md-4 mx-auto my-3">
          <!-- Card Starts -->
          <div class="card border-0 text-center">
            <div class="card-body p-3">
              <img class="my-1 myIcon" src="./assets/icons/flaticon-ratealert.png" alt="">
              <!-- ICONS -->
              <h3 class="my-3">Currency Rate Alerts</h3>
              <p class="my-3">
                Stay in control of your currency goals. Receive real-time rate alerts, ensuring you exchange your money
                at
                the perfect moment
              </p>
            </div>
            <!-- Card Body Ends -->
          </div>
          <!-- Card Ends -->
        </div>
        <!-- Col Ends -->
        <div class="col-12 col-sm-6 col-md-4 mx-auto my-3">
          <!-- Card Starts -->
          <div class="card border-0 text-center">
            <div class="card-body p-3">
              <img class="my-1 myIcon" src="./assets/icons/flaticon-currencyhedging.png" alt="">
              <!-- ICONS -->
              <h3 class="my-3">Currency Hedging</h3>
              <p class="my-3">
                Shield your business from currency volatility. Our expert team helps you implement effective hedging
                strategies, minimizing financial risks
              </p>
            </div>
            <!-- Card Body Ends -->
          </div>
          <!-- Card Ends -->
        </div>
        <!-- Col Ends -->
      </div>
      <!-- Row 2 Ends -->

    </div>
    <!-- Container Ends -->

  </section>

  <!-- Testimonials Section (Subrata)-->
  <section id="section-testimonials">
    <div class="testimonial">
      <!-- <h1 class="testimonialTitle">Customer Reviews</h1> -->
      <h1 class="text-center my-3 display-3 fw-medium ">Client Testimonials</h1>
      <hr class="text-white text-center customHR">
      <!-- <hr class="text-white text-center customHR"> -->
      <div class="review-box">
        <div id="slide">
          <div class="cardsubbu">
            <div class="card-profile">
              <img src="./assets/imgs/user1.jpg" alt="" />
              <div>
                <h3>Riley Olie</h3>
                <p>Web Developer</p>
              </div>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
              quisquam, voluptatem reprehenderit fugit molestias dolores
              tenetur. Ad ipsa voluptatibus facilis!
            </p>
          </div>
          <div class="cardsubbu">
            <div class="card-profile">
              <img src="./assets/imgs/user2.jpg" alt="" />
              <div>
                <h3>James Rover</h3>
                <p>Designer</p>
              </div>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
              quisquam, voluptatem reprehenderit fugit molestias dolores
              tenetur. Ad ipsa voluptatibus facilis!
            </p>
          </div>
          <div class="cardsubbu">
            <div class="card-profile">
              <img src="./assets/imgs/user3.jpg" alt="" />
              <div>
                <h3>Merlin Deduro</h3>
                <p>Senior Developer</p>
              </div>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
              quisquam, voluptatem reprehenderit fugit molestias dolores
              tenetur. Ad ipsa voluptatibus facilis!
            </p>
          </div>
          <div class="cardsubbu">
            <div class="card-profile">
              <img src="./assets/imgs/user4.jpg" alt="" />
              <div>
                <h3>Riley Olie</h3>
                <p>Lead Developer</p>
              </div>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
              quisquam, voluptatem reprehenderit fugit molestias dolores
              tenetur. Ad ipsa voluptatibus facilis!
            </p>
          </div>
        </div>

        <div class="sidebar">
          <img src="./assets/imgs/up-arrow.png" alt="" id="upArrow" />
          <img src="./assets/imgs/down-arrow.png" alt="" id="downArrow" />
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Us (Usama) -->
  <section class="testSection container-fluid myDark" id="section-contactus">
    <h1 class="text-center text-white pt-3 display-3 fw-medium ">Contact Us</h1>
    <hr class="text-white text-center customHR">
    <?php
        if (isset($_SESSION['alertMessage']) && isset($_SESSION['alertType']))
        {
            $alertMessage = $_SESSION['alertMessage'];
            $alertType = $_SESSION['alertType'];
            echo "
            <div class='alert alert-$alertType alert-dismissible fade show' role='alert'>
            <strong>$alertMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
          ";
          unset($_SESSION['alertMessage']);
          unset($_SESSION['alertType']);
        }
    ?>

    <div class="contact_container">
      <div class="form">
        <div class="contact-info">
          <h3 class="titlecontact">Let's get in touch</h3>
          <p class="textcontact">
            Have Questions regarding our services? Connect with our experts to learn more...
          </p>

          <div class="info">
            <div class="information">
              <img src="./assets/imgs/contactus.jpg" class="icon" alt="" />
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>       
          <form action="operations.php" method="post">
            <h3 class="titlecontact">Contact us</h3>
            <div class="contact-input-container">
              <input type="text" name="contName" class="input" />
              <label for="contName">Name</label>
              <span>Name</span>
            </div>           
            <div class="contact-input-container">
              <input type="email" name="contEmail" class="input" />
              <label for="contEmail">Email</label>
              <span>Email</span>
            </div>
            <div class="contact-input-container">
              <input type="tel" name="contPhone" class="input" />
              <label for="contPhone">Phone</label>
              <span>Phone</span>
            </div>           
            <div class="contact-input-container">
              <input type="text" name="contSubject" class="input" />
              <label for="contSubject">Subject</label>
              <span>Subject</span>
            </div>           
            <div class="contact-input-container textarea">
              <textarea name="contMessage" class="input"></textarea>
              <label for="contMessage">Message</label>
              <span>Message</span>
            </div>            
            <input type="submit" id="submit" name="contact" value="Submit Form" class="contact-btn" />
          </form>
        </div>
      </div>
    </div>
  </section>


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

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Bootstrap JS with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

  <!-- AOS JS -->
  <script>
    AOS.init();
  </script>

  <script src="./js/indexscript.js"></script>
</body>

</html>