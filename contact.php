<?php

$result="";

if(isset($_POST['submit'])){
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $mail->Host='smtp.gmail.com';
    $mail->Port='587';
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='yfoods14@gmail.com';
    $mail->Password='Yummy1234';
    

    $mail->setFrom($_POST['email']);
    $mail->addAddress('yfoods14@gmail.com');
    $mail->addReplyTo($_POST['email']);

    $mail->isHTML(true);
    $mail->Subject='Form Submission: '.$_POST['subject'];
    $mail->Body='<h1 align=center>First_Name: '.$_POST['fname'].'Last_Name: '.$_POST['lname'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['msg'].'<br>PHONE: '.$_POST['phnum'].'</h1>';

    if(!$mail->send()){
        $result="Something went wrong. Please try again.";
    }
    else{
        $result="Thanks ".$_POST['fname']." for contacting us. We'll get back to you soon!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Google Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">

    <!-- required link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- CSS Import -->
    <!-- <link rel="stylesheet" href="style.css"> -->

    <title>Yummy Foods- the foodie zone</title>

    <SCRIPT type="text/javascript">
        function validate(thisform)
        {
        
            var ph = thisform.phnum.value;
            
            if(ph.length<10)
            {
                alert("phone number must have atleast 10 digits");
                thisform.phnum.focus();	
                return false;
            }
            if(isNaN(ph))
            {
                alert("Invalid phone number");
                thisform.phnum.focus();	
                return false;
            }
                return true;
        }
        </SCRIPT>
</head>

<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="assests/img/logo.png" width="40" height="40"  alt="error 404">
          </a>
        <a class="navbar-brand" href="#" style="color: orangered">YummyFoods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./gallery.html">Gallery</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./contact.php">Contact Us</a>
                </li>


            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search food" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="mx-2">
                <!-- Example single danger button -->
                <button onclick="location.href='login.html'"  class="btn btn-danger">Log In</button>

                <button onclick="location.href='signup.html'" class="btn btn-danger" type="submit" >Sign up</button>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <h2>Contact Us</h2>
        <h5 class="text-center text-success"><?= $result; ?></h5>
        <form action="" onsubmit="return validate(this)" method="post">
            <label for="exampleFormControlInput1">Name </label>
            <div class="form-row form-group">
                <div class="col">
                  <input name="fname" type="text" class="form-control" placeholder="First name" required>
                </div>
                <div class="col">
                  <input name="lname" type="text" class="form-control" placeholder="Last name" required>
                </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email address</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="abc@example.com" name="email" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Phone Number</label>
                <input type="tel" class="form-control" id="formGroupExampleInput" placeholder="10-digit number" name="phnum" required>
              </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Subject</label>
                <input class="form-control" placeholder="Enter Subject" name="subject" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Message</label>
              <textarea name="msg" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button name="submit" class="btn btn-primary">submit</button>
        </form>
    </div>

    <footer class="container">
        <p>© 2020-2021 Yummy Foods, Inc.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
</body>


</html>