<?php
session_start();
//include('index.html');
date_default_timezone_set('Asia/Yangon');
error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(E_ALL & ~E_WARNING);
$connect = mysqli_connect('localhost','root','','nadifloral');

$select = "select * from bouquets";
$runselect = mysqli_query($connect,$select);
$rowcount = mysqli_num_rows($runselect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquet Display</title>
    <link rel="shortcut icon" href="Image/logo.png" type="image/x-icon">
    <!-- Google Fonts CDN Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:ital@1&family=Nunito:wght@500&family=Signika+Negative:wght@700&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Sweet Alert CDN Link -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        body
        {
            background-image: url("Image/background.jpg");
        }
        h1
        {
            text-align: center;
            font-family: 'Signika Negative', sans-serif;
        }
        h1::after
        {
            margin: auto;
            content: "";
            display: block;
            width: 130px;
            height: 2px;
            background-color:  rgb(147, 19, 206);
            margin-top: 10px;
            margin-bottom: 30px;
        }
        section#pizza-display
        {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            font-family: 'Nunito', sans-serif;
        }
        section#pizza-display > div
        {
            width: 260px;
            /* border: 1px solid black; */
            height: 400px;
            box-shadow: 1px 1px 10px black;
            margin-top: 10px;
            margin-bottom: 20px;
            background-color: rgba(209, 180, 223,0.7);
        }
        section#pizza-display > div:hover
        {
            transform: scale(1.1);
        }
        section#pizza-display > div > img
        {
            width: 95%;
            height: 220px;
            padding: 5px;
        }
        a#btnmore
        {
            background-color: rgba(63, 5, 90, 0.8);
            text-decoration: none;
            color: white;
            padding: 8px 12px;
            border-radius: 25px;
        }
        a#btnmore:hover{ color: rgb(218, 28, 85); }
        section#footer
        {
            background-color: rgba(63, 5, 90, 0.8);
            width: 100%;
            padding: 10px;
            color:rgb(209, 180, 223);
            font-family:'Nunito',sans-serif;
            text-align: center;
            bottom: 0;
            position: absolute;
    
        }
    </style>
</head>
<body>
<h1>Availabe Bouquets</h1>
<section id="pizza-display">
    <?php
    for($i=0; $i < $rowcount; $i++) 
    { 
        $data = mysqli_fetch_array($runselect);
        echo "<div>";
        echo "<img src='".$data['FloralPicture']."'>";
        echo "<table width='85%' height='150px' border='0' align='center'>";
        echo "<tr><td>Pizza: </td>";
        echo "<td>".$data['FloralName']."</td></tr>";
        echo "<tr><td>Size: </td><td>Regular</td></tr>";
        echo "<tr><td>Price: </td>";
        echo "<td>".$data['UnitPrice']." MMK</td></tr>";
        echo "<tr><td colspan='2' align='center'><a href='FloralOrder.php?pid=".$data['FloralID']."' id='btnmore'>More Detail</a></td></tr>";
        echo "</table>";
        echo "</div>";
    }

    ?>
        <!-- <div>
            <img src="Image/pizza_img.jpg" width="150px" height="150px"> 
            <table>
                <tr>
                    <td>Pizza: </td>
                    <td>Chicken Mushroom Pizza</td>
                </tr>
                <tr>
                    <td>Size: </td>
                    <td>Regular</td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>9500</td>
                </tr>
                <tr>
                    <td colspan="2"><a href="">More Detail</a></td>
                </tr>
            </table>
        </div> -->
    </section>
    <section id="footer">
    
        <footer>
            <p> &copy; Copyright 2020 Nadifloral. All rights reserved.</p>
        </footer>
    </section>
</body>
</html>


<!-- <style>
table#testtable
{
    /* width: 90%; */
    width: 1290px;
}
#testimg
{
    /* width: 100%; */
    width: 400px;
}

</style>
<table id="testtable" align="center">
    <tr>
        <td><img src="Image/pizza_img.jpg" id="testimg"></td>
        <td><img src="Image/pizza_img.jpg" id="testimg"></td>
        <td><img src="Image/pizza_img.jpg" id="testimg"></td>
    </tr>
</table> -->