<?php

    $names = $_POST['fullName'];
    $email = $_POST['Email'];
    $subject = $_POST['Subject'];
    $msg = $_POST['msg'];

    mail("casulemarc2014@gmail.com", "Contact About Your Portfilio Website!", $message, "From : $email\r\n");
    echo "Thank for Contacting Me, I'll reach back to you ASAP!"

?>