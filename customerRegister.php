<?php
//include('index.html');
$hostname = "localhost";
$username = "root";
$password = "";
$database = "nadifloral";
$connect = mysqli_connect($hostname,$username,$password,$database);

if(isset($_POST['btnsignup']))
{
    $cname = $_POST['txtname'];
    $email = $_POST['txtemail'];
    $pass = $_POST['txtpass'];
    $dateofbirth = $_POST['dob'];
    $ph = $_POST['txtph'];
    $gender = $_POST['rdogender'];
    $address = $_POST['txtaddress'];

    $profile = $_FILES['filprofile']['name'];
    $filepath="CustomerProfile/";
    if($profile)
    {
        $filename = $filepath."".$profile; //CustomerProfile/profile.jpg
        $copy=copy($_FILES['filprofile']['tmp_name'],$filename);
        if(!$copy)
        {
            exit("Problem occur in image store! Please try again!");
        }
    }

    $insertcustomer = "INSERT into customer(CustomerName,Email,Password,DateOfBirth,Phone,Gender,Addreess,ProfilePicture) values('$cname','$email','$pass','$dateofbirth','$ph','$gender','$address','$filename')";


    $runinsert = mysqli_query($connect,$insertcustomer);

    if($runinsert)
    {
        echo "<script>alert('User Account successfully created.')</script>";
    
    }
    else
    {
        echo "<script>alert('Something went wrong! Pls try agian')</script>";
    }
    

}



?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>
    <link rel="shortcut icon" href="Image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index_reg.css">
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:ital@1&family=Nunito:wght@500&family=Signika+Negative:wght@700&family=Ubuntu:wght@700&display=swap" rel="stylesheet">

   
</head>
    <body>
        <br>
        <h2 align="center" >Sign Up</h2>
        <fieldset style="width: 40%; margin: auto; border-radius: 30px;">
            
        <form action="" method="post" enctype="multipart/form-data">
            <table width="80%" align="right">
            
                <tr>
                    <td>CustomerName:</td>
                    <td style="padding: 5px;"><input type="text" placeholder="Eg: John" required name="txtname"></td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td style="padding: 5px;"><input type="email" placeholder="Eg: Jackson" required name="txtemail"></td>
                </tr>
                
                <tr>
                    <td>Password:</td>
                    <td style="padding: 5px;"><input type="password" placeholder="**********" required name="txtpass"></td>
                </tr>

                <tr>
                    <td>DateofBirth:</td>
                    <td style="padding: 5px;"><input type="date" required name="dob"></td>
                </tr>

                <tr>
                    <td>Phone:</td>
                    <td style="padding: 5px;"><input type="txt" required onkeypress="return(event.charCode !=8 && event.charCode ==0 ||(event.charCode>=48 && event.charCode <=57))" maxlength="11" minlength="11" minlength name="txtph"></td>
                </tr>

                <tr>
                    <td>Gender:</td>
                    <td style="padding: 5px;">
                        <input type="radio" name="rdogender" checked value="Male">Male
                        <input type="radio" name="rdogender" value="Female">Female
                    </td>
                </tr>

                <tr>
                    <td>Profile Picture:</td>
                    <td style="padding: 5px;"><input type="file" name="filprofile"></td>
                </tr>

                <tr>
                    <td>Address:</td>
                    <td style="padding: 5px;"><textarea cols="20" rows="5" name="txtaddress"></textarea></td>                
                </tr>

                <tr>
                    
                    <td><input type="submit" value="Sign Up" name="btnsignup"></td>
                    <td><input type="button" value="Back" onclick="history.back()"></td>
                </tr>
            </table>
        </form>
        </fieldset>
        <br>
       
        <section id="footer" style=" background-color: rgba(63, 5, 90, 0.8);width: 100%;padding: 10px;color:rgb(209, 180, 223);font-family:'Nunito',sans-serif;text-align: center;bottom: 0;position: absolute;">
    
            <footer>
                <p> &copy; Copyright 2020 Nadifloral. All rights reserved.</p>
            </footer>
        </section>
    </body>
</html>