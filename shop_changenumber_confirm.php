<body style="background-color:#FFD2D2;">
<?php
    require("DBconnect.php");
    //接收表單數值
    $myorder_id=$_POST["myorder_id"];
    $user_id=$_POST["user_id"];
    $product_id=$_POST["product_id"];
    $product_photo=$_POST["product_photo"];
    $product_type=$_POST["product_type"];
    $product_price=$_POST["product_price"];
    $order_number=$_POST["order_number"];
    $order_price=$product_price*$order_number;


    $SQL="UPDATE myorder SET user_id='$user_id',product_id='$product_id',product_photo='$product_photo',product_type='$product_type',product_price='$product_price',order_number='$order_number',order_price='$order_price' WHERE myorder_id='$myorder_id'";
    
        if(mysqli_query($link,$SQL)){
            echo "<script type='text/javascript'>";
            echo "alert('更新成功')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('更新失敗')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
        }
    ?>