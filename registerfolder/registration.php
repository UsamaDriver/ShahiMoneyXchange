<?php
    session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Registration Page | Shahi XChange</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>

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

    <div class="form-wrapper">
      <div class="form-side">
        <a href="#" title="Logo">
          <img src="resource/ofin.png" class="logo" alt="Ofin" />
        </a>
        <form class="my-form" action="../operations.php" method="post">
          <div class="form-welcome-row">
            <h1>Create your account &#x1F44F;</h1>
          </div>
          <div class="socials-row">
            <a href="#" title="Use Google">
              <img src="resource/google.png" alt="Google" />Use Google
            </a>
            <a href="#" title="Use Apple">
              <img src="resource/apple.png" alt="Apple" /> Use Apple
            </a>
          </div>
          <div class="divider">
            <div class="divider-line"></div>
            Or
            <div class="divider-line"></div>
          </div>
          <div class="text-field">
            <div class="text-field">
              <label for="userEmail"
                >Email:
                <input
                  type="email"
                  id="userEmail"
                  name="userEmail"
                  placeholder="Your Email"
                  required
                />
                <img src="resource/email.svg" alt="email" />
              </label>
            </div>
            <label for="fullName"
              >Name:
              <input
                type="text"
                id="fullName"
                name="fullName"
                placeholder="Your Name"
                required
              />
              <img src="resource/profile.webp" alt="email" />
            </label>
          </div>
          <div class="text-field">
            <label for="baseCurrency"
              >Currency:
              <select name="baseCurrency" id="baseCurrency">
                <option value="INR">India rupees</option>
                <option value="USD">United Stated Dollar</option>
                <option value="NZD">New Zealand Dollar</option>
                <option value="CAD">Canadian Dolllar</option>
                <option value="JPY">Japan Yen</option>
              </select>
              <!-- <img src="resource/email.svg" alt="email" /> -->
            </label>
          </div>
          <div class="text-field">
            <label for="userPhone"
              >Phone:
              <input
                id="userPhone"
                type="number"
                name="userPhone"
                placeholder="Your Phone Number"
                title="Enter 10 digits Only"
                required
                maxlength="10"
              />
              <img src="resource/phone.jpg" alt="password" />
            </label>
          </div>
          <div class="text-field">
            <label for="userPassword"
              >Password:
              <input
                id="userPassword"
                type="password"
                name="userPassword"
                placeholder="Your Password"
                title="Minimum 6 characters at 
                              least 1 Alphabet and 1 Number"
                required
              />
              <img src="resource/password.svg" alt="password" />
            </label>
          </div>
          <input type="text" name="userType" hidden value="normal">
          <button type="submit" class="my-form__button" name="register">Register</button>
          <div class="my-form__actions">
            <a href="../loginfolder/login.php" title="Create Account"> Already have an account? </a>
          </div>
        </form>
      </div>
      <div class="info-side">
        <img src="resource/mock.png" alt="Mock" class="mockup" />
      </div>
    </div>

  </body>
</html>
<!-- pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" -->
