<?php
session_start();
//include('index.html');
date_default_timezone_set('Asia/Yangon');
error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(E_ALL & ~E_WARNING);
$connect = mysqli_connect('localhost','root','','nadifloral');
if (isset($_POST['btnlogin'])) 
{
    $email = $_POST['cuemail']; 
    $pass = $_POST['cupass'];

    $uppercase = preg_match('@[A-Z]@',$pass);
    $lowercase = preg_match('@[a-z]@',$pass);
    $number = preg_match('@[0-9]@',$pass);
    $specialchar = preg_match('@[^\w]@',$pass);
    if(!$uppercase || !$lowercase || !$number || !$specialchar || strlen($pass) < 8)
    {
        echo "<script>alert('Password must be atleast 8 char and must be include uppercase, lowercase, number and special character.');</script>";
    }
    else
    {
        $login = "SELECT * FROM customer where Email = '$email' AND Password='$pass'";
        $runlogin = mysqli_query($connect,$login);
        $countdata = mysqli_num_rows($runlogin);
        if($countdata>0)
        {
            $fetchdata= mysqli_fetch_array($runlogin);
            $_SESSION['cid'] = $fetchdata['CustomerID'];
            $_SESSION['email'] = $fetchdata['Email'];
            echo "<script>alert('Customer login Successful!');</script>"; 
        }
        else
        {
            echo "<script>alert('Email or Password may be wrong! Pls try agin!');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link rel="shortcut icon" href="Image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index_login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:ital@1&family=Nunito:wght@500&family=Signika+Negative:wght@700&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <h2 style="text-align: center;" id="CuSignIn">Customer Sign In</h2>
    <fieldset style="width: 22%; margin: auto; border-radius: 30px;">

    <form action="customerLogin.php" method="post">
        <table>
            <tr>
                <td style="color:rgb(209, 180, 223); padding: 5px; font-family: 'Signika Negative', sans-serif;">Email:</td>
                <td style="padding: 10px;"><input type="email" placeholder="Eg: Jackson" required name="cuemail" id="cuemail" ></td>
            </tr>
                
            <tr>
                <td style="color:rgb(209, 180, 223); padding:5px; font-family: 'Signika Negative', sans-serif;">Password:</td>
                <td style="padding: 10px;"><input type="password" placeholder="**********" required name="cupass" ></td>
            </tr>
            <tr>
                <td style="padding: 10px; font-family: 'Signika Negative', sans-serif;"><input type="submit" value="Log In" name="btnlogin"></td>
            </tr>

        </table>

</fieldset>
<br>
<br>
<br>
<div class="container">
   
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="Image/banner1.jpg" style="width:100%;  height: 400px;">
      </div>

      <div class="item">
        <img src="Image/shop.jpg"  style="width:100%; height: 400px;">
      </div>

      <div class="item">
        <img src="Image/banner.jpg"  style="width:100%; height: 400px;">
      </div>
    
      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<br>
<section id="footer">
    
        <footer>
            <p> &copy; Copyright 2020 Nadifloral. All rights reserved.</p>
        </footer>
</section>
</body>
</html>