<?php
if (empty($_POST["email"])) 
{
header ("Location: ./index.php?c=Messages&");
}
else
{
    include("./connect_db.php");
    include("./sanatize.php");
    $email = sanatize($_POST["email"]);
    $sql = "SELECT * FROM `register` WHERE `Email` = '{$email}'";
    $result = mysqli_query($conn, $sql);
    echo mysqli_num_rows($result);
    
    if (mysqli_num_rows($result)) {
        header ("Location: ./index.php?c=Messages&alert=emailexists");
    } else {
        $password = "geheim";
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO `register` (`ID`,
                                        `Email`,
                                        `Password`,
                                        `UserRole`)
                                Values (NULL,
                                        '$email',
                                        '$password_hash',
                                        'Customer');";

        $result = mysqli_query($conn, $sql);

        $id = mysqli_insert_id($conn);

        if ($result) {
            $to = $email;
            $subject = "Uw activatiemail voor uw account op Marvel.nl";
            $message = '<DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="device_width", initial-scale="1.0";>
                            <title>Document</title>
                        </head>
                        <body>
                            <h1>Beste gebruiker</h1>
                            <p>U heeft zich zojuist geregistreerd op Marvel.nl<p>
                        </body>';

            $headers = "From: Noreply@Marvel.nl\r\n";
            $headers .="Cc: marcodoeland@outlook.com";
            $headers .="MIME-Version: 1.0";
            $headers .="Content-type: text/html; charset=UTF-8";


            mail($to, $subject, $message, $headers);
            header("Location: ./index.php?c=Messages&alert=reg-suc");
        }
    }
}
?>