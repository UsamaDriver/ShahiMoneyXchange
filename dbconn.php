<?php

class connectDB
{
    private $server = "localhost";
    private $username = "root";
    private $pswd = "";
    private $dbname = "test";
    public $c;
    public function __construct()
    {
        $this->c = mysqli_connect($this->server, $this->username, $this->pswd, $this->dbname);
        if ($this->c) {
            // echo "connected";
        } else {
            echo "Database not connected error is: " . mysqli_error();
        }
    }

    public function registerUser($userEmail,$fullName,$baseCurrency,$userPhone,$userPassword,$userType)
    {
        $query = "insert into user_details (userEmail,fullName,baseCurrency,userPhone,userPassword,userType) values('$userEmail','$fullName','$baseCurrency','$userPhone','$userPassword','$userType')";
        $result = mysqli_query($this->c,$query);
        return $result;
    }

    public function loginUser($userEmail,$userPassword)
    {
        $query = "select * from user_details where userEmail='$userEmail' AND userPassword='$userPassword'";
        $result = mysqli_query($this->c,$query);
        return $result;
    }
    public function loginAdmin($userEmail,$userPassword)
    {
        $query = "select * from admin_details where adminEmail='$userEmail' AND adminPassword='$userPassword'";
        $result = mysqli_query($this->c,$query);
        return $result;
    }

    public function submitContactForm($contName,$contEmail,$contPhone,$contSubject,$contMessage)
    {   
        $query = "insert into contact_details (contName,contEmail,contPhone,contSubject,contMessage) values('$contName','$contEmail','$contPhone','$contSubject','$contMessage')";
        $result = mysqli_query($this->c,$query);
        return $result;
    }

    public function submitBookingForm($userEmail,$userName,$userContact,$userAddress,$requestDate,$requiredCurrency,$requiredAmount)
    {   
        $query = "insert into booking_details (userEmail,userName,userContact,userAddress,requestDate,requiredCurrency,requiredAmount) values('$userEmail','$userName','$userContact','$userAddress','$requestDate','$requiredCurrency',$requiredAmount)";
        $result = mysqli_query($this->c,$query);
        return $result;
    }

    public function getAccountDetails($userEmail)
    {
        $query = "select * from user_details where userEmail='$userEmail'";
        $result = mysqli_query($this->c,$query);
        return $result;
    }

    public function getServiceRates()
    {
        $query = "select * from service_rates";
        $result = mysqli_query($this->c,$query);
        return $result;
    }

    public function doTransaction($moneySender,$moneyReceiver,$amountSent,$amountReceived,$platformFees,$gst,$sendCurrency,$receiveCurrency,$senderEmail,$receiverEmail)
    {
        $flag = false;

        $query1 = "insert into transaction_details (moneySender,moneyReceiver,amountSent,amountReceived,platformFees,gst,sendCurrency,receiveCurrency,senderEmail,receiverEmail) values('$moneySender','$moneyReceiver',$amountSent,$amountReceived,$platformFees,$gst,'$sendCurrency','$receiveCurrency','$senderEmail','$receiverEmail')";
        $result1 = mysqli_query($this->c,$query1);

        $query2 = "update user_details set currentBalance=currentBalance-$amountSent where userEmail='$senderEmail'";
        $result2 = mysqli_query($this->c,$query2);

        $query3 = "update user_details set currentBalance=currentBalance+$amountReceived where userEmail='$receiverEmail'";
        $result3 = mysqli_query($this->c,$query3);
        
        $query4 = "update company_earnings set totalPlatformFees=totalPlatformFees+$platformFees, totalGst=totalGst+$gst";
        $result4 = mysqli_query($this->c,$query4);

        if ($result1 && $result2 && $result3 && $result4)
        {
            $flag = true;
        }

        return $flag;
    }

    public function viewTransactions($userEmail)
    {   
        $query = "select * from transaction_details where senderEmail='$userEmail' OR receiverEmail='$userEmail'";
        $result = mysqli_query($this->c,$query);
        return $result;
    }
    public function viewRegisteredUsers()
    {   
        $query = "select * from user_details";
        $result = mysqli_query($this->c,$query);
        return $result;
    }
    public function viewCompanyEarnings()
    {   
        $query = "select * from company_earnings";
        $result = mysqli_query($this->c,$query);
        return $result;
    }

    public function getContactRequest($userEmail)
    {
        $query = "select * from contact_details where contEmail='$userEmail'";
        $result = mysqli_query($this->c,$query);
        return $result;
    }
    public function getAllContactRequest()
    {
        $query = "select * from contact_details";
        $result = mysqli_query($this->c,$query);
        return $result;
    }

    public function getBookingRequest($userEmail)
    {
        $query = "select * from booking_details where userEmail='$userEmail'";
        $result = mysqli_query($this->c,$query);
        return $result;
    }
    public function getAllBookingRequest()
    {
        $query = "select * from booking_details";
        $result = mysqli_query($this->c,$query);
        return $result;
    }
    
    public function changeServiceRates($platformFees,$gst)
    {
        $query = "update service_rates set platformFees=$platformFees, gst='$gst'";
        $result = mysqli_query($this->c,$query);
        return $result;
    }

    public function toggleContactRequest($contID,$check)
    {
        $query = "update contact_details set attendedOrNot=!$check where contID=$contID";
        $result = mysqli_query($this->c,$query);
        return $result;
    }
    public function toggleBookingRequest($bookingID,$check)
    {
        $query = "update booking_details set attendedOrNot=!$check where bookingID=$bookingID";
        $result = mysqli_query($this->c,$query);
        return $result;
    }
}
