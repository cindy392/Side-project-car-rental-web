<body style="background-color:	#FFECEC;">
<?php
//將產品product增加至購物車myorder
    session_start();
    require("DBconnect.php");

    $product_id=$_GET["product_id"];//primary key，用這個找內容
    $SQL="SELECT * FROM product WHERE product_id='$product_id'";
    if($result=mysqli_query($link,$SQL)){//找出原在product的內容
        while($row=mysqli_fetch_assoc($result)){
            $product_photo=$row["product_photo"];
            $product_type=$row["product_type"];
            $product_price=$row["product_price"];
        }
    }
    $user_id=$_COOKIE["UID"];
    $order_number=1;
    $order_price=$product_price*$order_number;

    $SQL="INSERT INTO myorder (myorder_id,user_id,product_id,product_photo,product_type,product_price,order_number,order_price) VALUES ('','$user_id','$product_id','$product_photo','$product_type','$product_price','$order_number','$order_price')";
        if(mysqli_query($link,$SQL)){
            echo "<script type='text/javascript'>";
            echo "alert('加入購物車成功')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('加入購物車失敗')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=show.php'>";
        } 
?>