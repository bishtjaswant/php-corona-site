<?php

require_once '../db/db.php';


if (isset($_POST['send'])  && isset($_POST['g-recaptcha-response'])) {

    // SERVER SIDE
    define('SECRETKEY', '6LeNwOQUAAAAAPTXtR3z1u-QLvQcb76hl3RSC4jT');
    // print_r($_POST);die;
    $request_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . SECRETKEY . '&response=' . $_POST['g-recaptcha-response'];
    $captcha_response =  json_decode(file_get_contents($request_url));


    if ($captcha_response->success) {



        $name =  htmlspecialchars(strip_tags($_POST['name']));
        $email =  htmlspecialchars(strip_tags($_POST['email']));
        $phone =  htmlspecialchars(strip_tags($_POST['phone']));
        $address =  htmlspecialchars(strip_tags($_POST['address']));
        $feeling =  htmlspecialchars(strip_tags($_POST['feeling']));
        $symtoms =  $_POST['symtoms'];
        $corona = "";

        foreach ($symtoms as $symtom) {
            htmlspecialchars(strip_tags($symtom));
            $corona .= $symtom . ',';
        }



        $query = "INSERT INTO `corona_virus`.`users` (`name`, `email`, `address`, `phone`, `symptoms`, `description`) VALUES ('$name', '$email', '$address', '$phone', '$corona', '$feeling')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            echo '<script>alert("thank you for  share your symptoms \n we will contact with you soon as posible \n please stay home stay save" );
        window.location.assign("http://localhost:8080/corona/index.php");

        </script>';

            die;
        } else {
            echo '<script>alert("query  failed " );
        window.location.assign("http://localhost:8080/corona/index.php");
        </script>';
            die;
        }
    } else {
        echo '<script>alert("invalid recaptcha code \n please try again \n  sorry for regret \n thank you" );
    window.location.assign("http://localhost:8080/corona/index.php");
    </script>';
        die;
    }
}
