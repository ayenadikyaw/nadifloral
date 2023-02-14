<?php
session_start();
//include('index.html');
date_default_timezone_set('Asia/Yangon');
error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(E_ALL & ~E_WARNING);
$connect = mysqli_connect('localhost','root','','nadifloral');

if(!isset($_SESSION['cid']))
{
    echo "<script>alert('Customer must login first!');</script>";
    echo "<script>location='customerLogin.php'</script>";
}
else
{
    $cid = $_SESSION['cid'];
    $selectcustomer = "Select * from customer where CustomerID = '$cid'";
    $runcustomer = mysqli_query($connect,$selectcustomer);
    $cdata = mysqli_fetch_array($runcustomer);
}

if ((!isset($_REQUEST['pid'])) && (!isset($_POST['btnorder']))) 
{
    echo "<script>alert('Something went wrong!')</script>";
    echo "<script>location='FloralDisplay.php'</script>";
}
else
{
    $floralid = $_REQUEST['pid'];
    $select = "Select * from bouquets where FloralID = '$floralid'";
    $run = mysqli_query($connect,$select);
    $data = mysqli_fetch_array($run);

    if(isset($_POST['btnorder']))
    {
        $orderqty = $_POST['txtorderqty'];
        $todaydate = date('Y-m-d');
        $deliinfo = $_POST['rdodeli'];
        $paymentinfo = $_POST['rdopayment'];
        $totalamount = $orderqty * $data['UnitPrice'];
        $balance = $data['TotalQuantities'];

        if($deliinfo == 'olddeli')
        {
            if($paymentinfo == 'cod')
            {
                $insert = "INSERT into orders(OrderQty,TotalAmount,OrderDate,PaymentType,DeliveryType,FloralID,CustomerID) values('$orderqty','$totalamount','$todaydate','$paymentinfo','$deliinfo','$floralid',
                '$cid')";
                $runinsert = mysqli_query($connect,$insert);
                if($runinsert && ($orderqty<=$balance))
                {
                    $updateqty = "Update bouquets set TotalQuantities = TotalQuantities - '$orderqty' where FloralID='$floralid'";
                    $runqty = mysqli_query($connect,$updateqty);
                    echo "<script>alert('Order Successful! Total amount: $totalamount MMK. Delivery time may be 1 to 2 hours');</script>";
                    echo "<script>location='FloralDisplay.php'</script>";
                }
                else
                {
                    echo "<script>alert('Something went wrong!')</script>";
                    echo "<script>location='FloralDisplay.php'</script>";
                }
            }
            else
            {
                // $newphone = $_POST['txtnewphone'];
                // $newaddress = $_POST['txtnewaddress'];
                $payment = $_FILES['filscreenshot']['name'];
                $filepath = "Payment/";
                if($payment)
                {
                    $filename = $filepath . "" . $payment; 
                    $copy = copy($_FILES['filscreenshot']['tmp_name'],$filename);
                    if(!$copy)
                    {
                        exit("Problem occur in image store! Please try again!");
                    }
                }
                echo $insert = "INSERT into orders(OrderQty,TotalAmount,OrderDate,PaymentType,DeliveryType,FloralID,CustomerID,Screenshot) values('$orderqty','$totalamount','$todaydate','$paymentinfo','$deliinfo','$floralid','$cid','$filename')";
                $runinsert = mysqli_query($connect,$insert);
                if($runinsert)
                {
                    $updateqty = "Update bouquets set TotalQuantities = TotalQuantities - '$orderqty' where FloralID='$floralid'";
                    $runqty = mysqli_query($connect,$updateqty);
                    echo "<script>alert('Order Successful! Total amount: $totalamount MMK. Delivery time may be 1 to 2 hours');</script>";
                    echo "<script>location='FloralDisplay.php'</script>";
                }
                else
                {
                    echo "<script>alert('Something went wrong!')</script>";
                    echo "<script>location='FloralDisplay.php'</script>";
                }
            }
        }
        else
        {
            if($paymentinfo == 'cod')
            {
                $insert = "INSERT into orders(OrderQty,TotalAmount,OrderDate,PaymentType,DeliveryType,FloralID,CustomerID) values('$orderqty','$totalamount','$todaydate','$paymentinfo','$deliinfo','$floralid',
                '$cid')";
                $runinsert = mysqli_query($connect,$insert);
                if($runinsert && ($orderqty<=$balance))
                {
                    $updateqty = "Update bouquets set TotalQuantities = TotalQuantities - '$orderqty' where FloralID='$floralid'";
                    $runqty = mysqli_query($connect,$updateqty);
                    echo "<script>alert('Order Successful! Total amount: $totalamount MMK. Delivery time may be 1 to 2 hours');</script>";
                    echo "<script>location='FloralDisplay.php'</script>";
                }
                else
                {
                    echo "<script>alert('Something went wrong!')</script>";
                    echo "<script>location='FloralDisplay.php'</script>";
                }
            }
            else
            {
                // $newphone = $_POST['txtnewphone'];
                // $newaddress = $_POST['txtnewaddress'];
                $payment = $_FILES['filscreenshot']['name'];
                $filepath = "Payment/";
                if($payment)
                {
                    $filename = $filepath . "" . $payment; 
                    $copy = copy($_FILES['filscreenshot']['tmp_name'],$filename);
                    if(!$copy)
                    {
                        exit("Problem occur in image store! Please try again!");
                    }
                }
                echo $insert = "INSERT into orders(OrderQty,TotalAmount,OrderDate,PaymentType,DeliveryType,FloralID,CustomerID,Screenshot) values('$orderqty','$totalamount','$todaydate','$paymentinfo','$deliinfo','$floralid','$cid','$filename')";
                $runinsert = mysqli_query($connect,$insert);
                if($runinsert)
                {
                    $updateqty = "Update bouquets set TotalQuantities = TotalQuantities - '$orderqty' where FloralID='$floralid'";
                    $runqty = mysqli_query($connect,$updateqty);
                    echo "<script>alert('Order Successful! Total amount: $totalamount MMK. Delivery time may be 1 to 2 hours');</script>";
                    echo "<script>location='FloralDisplay.php'</script>";
                }
                else
                {
                    echo "<script>alert('Something went wrong!')</script>";
                    echo "<script>location='FloralDisplay.php'</script>";
                }
            }
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
    <title>Floral Order</title>
    <link rel="shortcut icon" href="Image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index_order.css">
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:ital@1&family=Nunito:wght@500&family=Signika+Negative:wght@700&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <style>
        label
        {
            margin-right: 10px;
        }
        fieldset
        {
            width: 90%;
            margin: auto;
            border-radius: 40px;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center; color:rgb(63, 5, 90);"><?php echo $data['FloralName']; ?> Set</h2>
    <form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend style="margin-left: 20px; color:rgb(218, 28, 85); font-size: 20px; font-weight: bold">Make your order</legend>
        <table border="0" align="center" width="85%">
            <tr>
                <td rowspan="2"><img src="<?php echo $data['FloralPicture'] ?>" width="320px" height="320px"></td>
                <td colspan="2">
                    <table>
                        <h2 style="color:rgb(218, 28, 85);">Bouquet Details</h2>
                        <tr>
                            <td width="120px"><b>Bouquet : </b></td>
                            <td><?php echo $data['FloralName']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Stock Qty : </b></td>
                            <td><?php echo $data['TotalQuantities']; ?> pcs</td>
                        </tr>
                        <tr>
                            <td><b>Size : </b></td>
                            <td>Regular</td>
                        </tr>
                        <tr>
                            <td><b>Unit Price: </b></td>
                            <td><?php echo $data['UnitPrice']; ?> MMK</td>
                        </tr>
                        <tr>
                            <td><b>Ingrediant: </b></td>
                            <td><?php echo $data['Ingrediants']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Order Qty: </b></td>
                            <td><input type="number" min="1" max="<?php echo $data['TotalQuantities']; ?>" name="txtorderqty" required> pcs</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="top" width="35%">
                    <table>
                        <h2 style="color:rgb(218, 28, 85);">Delivery Info</h2>
                        <tr>
                            <td><b>Delivery type </b></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="rdodeli" checked onclick="oldaddress();" value="olddeli"> Current Contact
                                <div style="margin: 4px 5px 4px 26px;" id="oldcontact"><label>Phone: </label><?php echo $cdata['Phone']; ?> <br> <label>Address: </label><?php echo $cdata['Address']; ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="rdodeli" onclick="newaddress();" value="newdeli"> New Contact
                                <div style="margin: 4px 5px 4px 26px;" id="newcontact"> <label>Phone: </label><input type="text" name="txtnewphone" id="newphone"><br> <label style="vertical-align: top; display: inline-block; margin-top: 30px;" >Address: </label><textarea name="txtnewaddress" id="" cols="19" rows="4" id="newadd"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td valign="top">
                    <table>
                        <h2 style="color:rgb(218, 28, 85);">Payment Info</h2>
                        <tr>
                            <td><b sty>Payment type </b></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="rdopayment" checked value="cod" onclick="codpay();"> Cash On Delivery
                            </td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="rdopayment" value="online" onclick="newpay();"> Online Payment
                                <div style="margin: 4px 5px 4px 28px;" id="onlinepay"> Kpay : 09973826172 <br>
                                AYApay : 09973826172 <br>
                                CBpay : 09973826172 <br>
                                Wave : 09973826172 <br>
                                Screenshot: <input type="file" name="filscreenshot" id="paymentss">
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btnorder" value="Order" style="margin-right: 50px; padding: 5px 15px; border-radius: 10px;">
                <input type="button" onclick="history.back();" value="Back" style="padding: 5px 15px; border-radius: 10px;"></td>
            </tr>
        </table>
    </fieldset>
    </form>
    <br>
    <section id="footer">
    
    <footer>
        <p> &copy; Copyright 2020 Nadifloral. All rights reserved.</p>
    </footer>
</section>

    <script>
        $(document).ready(function(){
            $('#newcontact').hide();
            $('#onlinepay').hide();
        });
        function newaddress()
        {
            $('#newcontact').show(2000);
            $('#oldcontact').hide(2000);
            $('#newphone').attr("required","");
            $('#newadd').attr("required","");
        }
        function oldaddress()
        {
            $('#newcontact').hide(2000);
            $('#oldcontact').show(2000);
            $('#newphone').removeAttr("required","");
            $('#newadd').removeAttr("required","");
        }
        function newpay()
        {
            $('#onlinepay').show(2000);
            $('#paymentss').attr("required","");
        }
        function codpay()
        {
            $('#onlinepay').hide(2000);
            $('#paymentss').removeAttr("required","");
        }
    </script>
</body>
</html>