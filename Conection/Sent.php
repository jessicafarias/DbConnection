<?php
if (!$_POST){}

else{
	 
    $Email = "support@jessicafarias.dx.am";
    $recipientEmail = $_POST["email"];

    $from = "Jessica Farias support <" . $Email . ">";
    $to = $recipientEmail;

    $subject = "Consulta";
    $body = $_POST["consulta"];
    
    if(mail($to,$subject,$body,$from)){
        echo 'E-mail message sent!';
        include 'success.html'; 
    } else {
        echo 'E-mail delivery failure!';
    }
}
?>
