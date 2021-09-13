<?php     
    
    $to_email = 't.pavlovic996@gmail.com';
    $subject = '';
    $message = $_POST["name"].' : Brend - '.$_POST["fBrend"].' Model -'.$_POST["model"].' '.$_POST["msg"];
    $headers = 'From:'.$_POST["email"];

    mail($to_email,$subject,$message,$headers);
?>