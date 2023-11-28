<?php
session_start();

    function makeAlert($alertMessage,$alertType,$location)
    {
        $_SESSION['alertMessage'] = $alertMessage;
        $_SESSION['alertType'] = $alertType;
        header("Location: $location");
    }
    if (isset($_GET['action']) && $_GET['action'] === 'logoutUser')
    {
        // echo "OK";
        unset($_SESSION['userEmail']);
        makeAlert('Logged out successfully!','success','./index.php');
    }
    elseif (isset($_GET['action']) && $_GET['action'] === 'logoutAdmin')
    {
        // echo "OK";
        unset($_SESSION['adminEmail']);
        makeAlert('Admin Logged out successfully!','success','./index.php');
    }
?>