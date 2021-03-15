<?php
require 'index.php';

 $error = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (!empty($name)){
        $name= trim($name);
        $name= filter_var($name,FILTER_SANITIZE_STRING);
    }else{
       $error .= 'Name error'; 
    }
    
    if (!empty($lastname)){
        $lastname = trim($lastname);
        $lastname = filter_var($lastname,FILTER_SANITIZE_STRING);
    }else{
        $error .= 'Last name error';
     }

    if (!empty($email)){
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    }else{
        $error .= 'Email error';
    }

    if (!empty($subject)){
        $subject = trim($subject);
        $subject = filter_var($subject,FILTER_SANITIZE_STRING);
    }else{
        $error .= 'Subject error';
     }

     if (!empty($message)){
        $message = htmlspecialchars($message);
        $message = trim(message);
        $message = filter_var($message,FILTER_SANITIZE_STRING);
        $message = stripslashes($message);
    }else{
        $error .= 'Message error';
     }

     if (!$error){
         $send_to = 'sebastianmawd@gmail.com';
         $send_subject = 'Correo enviado desde el Portfolio';
         $send_message = "De: $name  $lastname\n";
         $send_message .= "Asunto: $subject\n";
         $send_message .= "Mensaje:" . $message;

         mail($send_to, $send_subject,$send_message);
     }

}


?>