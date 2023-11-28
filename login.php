<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

    <form action="operations.php" method="post">
        <label for="userEmail"> Email : </label>
        <input type="text" name="userEmail"><br><br>
        <label for="userPassword"> Password : </label>
        <input type="text" name="userPassword"><br><br>
        <input type="submit" value="Login" name='login'>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>