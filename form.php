<link rel="stylesheet" href="style.css">
<!--php form-->

<?php
// define variables and set to empty values
    $nameErr = $emailErr = $messageErr = "";
    $name = $email = $message = $success= "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
        }
    }
    
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["message"])) {
        $message = "";
    } else {
        $message = test_input($_POST["message"]);
    }
    }
    if ($nameErr =='' and $emailErr == '' and $messageErr == ''){
        $message_body ='';
        unset($_POST['submit']);
        foreach($_POST as $key => $value){
            $message_body .= "$key: $value\n";
        }

        $to = 'casulemarc2014@gmail.com';
        $subject = 'Contact Form Submit';
        if (mail($to, $subject, $message)){
            $success = "Message sent, I'll get back to you shortly!";
            $name = $email = $message = '';
        }

    }

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>