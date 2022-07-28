<body style="background-color:#FFD2D2;">
<?php
//修改使用者訂單確認
    require("DBconnect.php");
    $userorder_id=$_POST["userorder_id"];
    $order_starttime=$_POST["order_starttime"];
    $order_endtime=$_POST["order_endtime"];
    $order_number=$_POST["order_number"];
    $order_return=$_POST["order_return"];
    $SQL="SELECT * FROM userorder WHERE userorder_id=$userorder_id";
    if($result=mysqli_query($link,$SQL)){//抓取myorder裡商品的變數
        while($row=mysqli_fetch_assoc($result)){
            $user_id=$row["user_id"];
            $user_name=$row["user_name"];
            $product_id=$row["product_id"];
            $product_photo=$row["product_photo"];
            $product_type=$row["product_type"];
            $order_date=$row["order_date"];        
        }
    }
    $SQL2="SELECT * FROM product WHERE product_id=$product_id";
    if($result2=mysqli_query($link,$SQL2)){//抓取myorder裡商品的變數
        while($row2=mysqli_fetch_assoc($result2)){
            $product_price=$row2["product_price"];      
        }
    }
    $order_price=$order_number*$product_price;
    $SQL1="UPDATE userorder SET user_id='$user_id',user_name='$user_name',product_id='$product_id',product_photo='$product_photo',product_type='$product_type',order_number='$order_number',order_price='$order_price',order_starttime='$order_starttime',order_endtime='$order_endtime',order_date='$order_date',order_return='$order_return' WHERE userorder_id='$userorder_id'";
    if(mysqli_query($link,$SQL1)){
        echo "<script type='text/javascript'>";
        echo "alert('更新成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=order.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('更新失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=order.php'>";
    }
    ?>
