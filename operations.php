<?php
session_start();
include('dbconn.php');

function makeAlert($alertMessage,$alertType,$location)
{
    $_SESSION['alertMessage'] = $alertMessage;
    $_SESSION['alertType'] = $alertType;
    header("Location: $location");
}

if(isset($_POST['register']))
{
    $fullName= $_POST['fullName'];
    $baseCurrency= $_POST['baseCurrency'];
    $userPhone= $_POST['userPhone'];
    $userEmail= $_POST['userEmail'];
    $userPassword= $_POST['userPassword'];
    $userType= $_POST['userType'];

    if (empty($fullName) || empty($baseCurrency) || empty($userPhone) || empty($userEmail) || empty($userPassword))
    {
        makeAlert('Please fill all the details!!','warning','./index.php');
        return;
    }

    $dbobj = new connectDB();
    $result= $dbobj->registerUser($userEmail,$fullName,$baseCurrency,$userPhone,$userPassword,$userType);
    
    if ($result)
    {
        makeAlert('Registration Successfull!','success','./index.php');
    }
    else
    {
        makeAlert('There was en error in registration, Please try again!','danger','./index.php');
    }
}
elseif (isset($_POST['login']))
{
    $userEmail= $_POST['userEmail'];
    $userPassword= $_POST['userPassword'];
    if (empty($userEmail) || empty($userPassword))
    {
        makeAlert('Please fill all the fields','warning','./index.php');
        // return;
    }

    $dbobj = new connectDB();
    $result1= $dbobj->loginUser($userEmail,$userPassword);
    $result2= $dbobj->loginAdmin($userEmail,$userPassword);

    if (mysqli_num_rows($result1)===0 && mysqli_num_rows($result2)===0)
    {
        makeAlert('Account not found! INCORRECT CREDENTIALS','info','./index.php');
    }
    elseif (mysqli_num_rows($result2)===1)
    {
        $_SESSION['adminEmail'] = $userEmail;
        makeAlert('Admin Login Successfull!','success','./index.php');
    }
    elseif (mysqli_num_rows($result1)===1)
    {
        $_SESSION['userEmail'] = $userEmail;
        makeAlert('Login Successfull!','success','./index.php');
    }
}
elseif (isset($_POST['contact']))
{
    $contName= $_POST['contName'];
    $contEmail= $_POST['contEmail'];
    $contPhone= $_POST['contPhone'];
    $contSubject= $_POST['contSubject'];
    $contMessage= $_POST['contMessage'];
    
    if (empty($contName) || empty($contEmail) || empty($contPhone) || empty($contSubject) || empty($contMessage))
    {
        makeAlert('Please fill all the details!!','warning','./index.php');
        return;
    }
    $dbobj = new connectDB();
    $result= $dbobj->submitContactForm($contName,$contEmail,$contPhone,$contSubject,$contMessage);
    if ($result)
    {
        makeAlert('Form Submitted successfully!!','success','./index.php');
        return; 
    }
    else
    {
        makeAlert('Error submitting form!!','danger','./index.php');
        return;
    }
}
elseif (isset($_POST['booking']))
{
    $userEmail= $_POST['userEmail'];
    $userName= $_POST['userName'];
    $userContact= $_POST['userContact'];
    $userAddress= $_POST['userAddress'];
    $requestDate= $_POST['requestDate'];
    $requiredCurrency= $_POST['requiredCurrency'];
    $requiredAmount= $_POST['requiredAmount'];
    
    if (empty($userEmail) || empty($userName) || empty($userContact) || empty($userAddress) || empty($requestDate)  || empty($requiredCurrency)  || empty($requiredAmount))
    {
        makeAlert('Please fill all the details!!','warning','./index.php');
        return;
    }
    $dbobj = new connectDB();
    $result= $dbobj->submitBookingForm($userEmail,$userName,$userContact,$userAddress,$requestDate,$requiredCurrency,$requiredAmount);
    if ($result)
    {
        makeAlert('Booking successfull!!','success','./index.php');
        return; 
    }
    else
    {
        makeAlert('An error occured, please try again!!','danger','./index.php');
        return; 
    }
}
elseif (isset($_GET['action']) && $_GET['action'] === 'getSendCurrency') {
    $sendCurrency;
    $dbobj = new connectDB();
    $senderAcc= $dbobj->getAccountDetails($_SESSION['userEmail']);
    while ($rec=mysqli_fetch_row($senderAcc))
    {
        GLOBAL $sendCurrency;
        $sendCurrency = $rec[3];
    }
    echo $sendCurrency;
}

elseif(isset($_GET['action']) && $_GET['action'] === 'getReceiveCurrency')
{
    $receiveCurrency;
    $dbobj = new connectDB();
    $receiverAcc= $dbobj->getAccountDetails($_GET['receiverEmail']);
    while ($rec=mysqli_fetch_row($receiverAcc))
    {
        GLOBAL $receiveCurrency;
        $receiveCurrency = $rec[3];
    }
    echo $receiveCurrency;
}
elseif(isset($_GET['action']) && $_GET['action'] === 'getPlatformFees')
{
    $platformFees;
    $dbobj = new connectDB();
    $result= $dbobj->getServiceRates();
    while ($rec=mysqli_fetch_row($result))
    {
        GLOBAL $platformFees;
        $platformFees = $rec[0];
    }
    echo $platformFees;
}
elseif(isset($_GET['action']) && $_GET['action'] === 'getGst')
{
    $gst;
    $dbobj = new connectDB();
    $result= $dbobj->getServiceRates();
    while ($rec=mysqli_fetch_row($result))
    {
        GLOBAL $gst;
        $gst = $rec[1];
    }
    echo $gst;
}
elseif(isset($_GET['action']) && $_GET['action'] === 'toggleContactRequest')
{
    $contID = $_GET['contID'];
    $check = $_GET['check'];
    settype($contID,'integer');
    settype($check,'integer');
    $dbobj = new connectDB();
    $result= $dbobj->toggleContactRequest($contID,$check);
    if ($result)
    {
        // makeAlert('Status Changed Successfully!!','success','./index.php');
        header('Location: ./contactqueriesfolder/checkcontactrequests.php');
        return; 
    }
    else
    {
        // makeAlert('Error changing the status!!','danger','./index.php');
        header('Location: ./contactqueriesfolder/checkcontactrequests.php');
        return; 
    }
}
elseif(isset($_GET['action']) && $_GET['action'] === 'toggleBookingRequest')
{
    $bookingID = $_GET['bookingID'];
    $check = $_GET['check'];
    settype($bookingID,'integer');
    settype($check,'integer');

    $dbobj = new connectDB();
    $result= $dbobj->toggleBookingRequest($bookingID,$check);
    if ($result)
    {
        // makeAlert('Status Changed Successfully!!','success','checkbookingrequests.php');
        header('Location: ./bookingqueriesfolder/checkbookingrequests.php');
        return; 
    }
    else
    {
        // makeAlert('Error changing the status!!','danger','checkbookingrequests.php');
        header('Location: ./bookingqueriesfolder/checkbookingrequests.php');
        return; 
    }
}
elseif (isset($_POST['transfer']))
{
    $moneySender;
    $moneyReceiver;
    $amountSent = $_POST['amountSent'];
    settype($amountSent,"float");
    $amountSent = round($amountSent,2);
    $amountReceived;
    $fetchedPlatformFees;
    $fetchedGst;
    $platformFees;
    $gst;
    $sendCurrency;
    $receiveCurrency;
    $senderEmail = $_SESSION['userEmail'];
    $receiverEmail = $_POST['receiverEmail'];

    $convertedAmount = $_POST['convertedAmount'];
    settype($convertedAmount,'float');
    $convertedAmount = round($convertedAmount,2);
    
    if ($senderEmail == $receiverEmail)
    {
        makeAlert('Sender and Receiver cannot be same!!','danger','transfer.php');
        return; 
    }

    $dbobj = new connectDB();

    $senderAcc= $dbobj->getAccountDetails($senderEmail);
    $receiverAcc= $dbobj->getAccountDetails($receiverEmail);
    $serviceRates= $dbobj->getServiceRates();

    if (mysqli_num_rows($receiverAcc)==0)
    {
        makeAlert('Please enter a valid email!!','danger','./index.php');
        return; 
    }

    while ($rec=mysqli_fetch_row($senderAcc))
    {
        GLOBAL $moneySender,$sendCurrency;
        $moneySender = $rec[2];
        $sendCurrency = $rec[3];
    }
    while ($rec= mysqli_fetch_row($receiverAcc))
    {
        GLOBAL $moneyReceiver,$receiveCurrency;
        $moneyReceiver = $rec[2];
        $receiveCurrency = $rec[3];
    }
    while ($rec= mysqli_fetch_row($serviceRates))
    {
	    GLOBAL $fetchedPlatformFees, $fetchedGst;
        $fetchedPlatformFees= $rec[0];
	    $fetchedGst = $rec[1];
    }

    $platformFees = $convertedAmount * $fetchedPlatformFees/100;
    $platformFees = round($platformFees,2);
    $gst = $convertedAmount * $fetchedGst/100;
    $gst = round($gst,2);
    $amountReceived = $convertedAmount - $platformFees - $gst;
    $amountReceived = round($amountReceived,2);

    $result= $dbobj->doTransaction($moneySender,$moneyReceiver,$amountSent,$amountReceived,$platformFees,$gst,$sendCurrency,$receiveCurrency,$senderEmail,$receiverEmail);
    if ($result)
    {
        makeAlert('Money Sent successfully!!','success','./index.php');
        return; 
    }
    else
    {
        makeAlert('An error occured, please try again later!!','danger','./index.php');
        return; 
    }

}
elseif(isset($_POST['changerates']))
{
    $platformFees = $_POST['platformFees'];
    $gst = $_POST['gst'];

    if (empty($platformFees) || empty($gst))
    {
        makeAlert('Please fill all the details!!','warning','../index.php');
        // return;
    }

    settype($platformFees,"integer");
    settype($gst,"integer");

    // echo "New Platform Fees: ".$platformFees." ".gettype($platformFees)." <br>";
    // echo "New GST: ".$gst." ".gettype($gst)." <br>";
    
    $dbobj = new connectDB();
    $result= $dbobj->changeServiceRates($platformFees,$gst);
    if ($result)
    {
        makeAlert('Rates updated successfully!!','success','./index.php');
        return; 
    }
    else
    {
        makeAlert('An error occured, please try again later!!','danger','./index.php');
        return; 
    }

}
else
{
    makeAlert('You cannot access that page directly','danger','./index.php');
}