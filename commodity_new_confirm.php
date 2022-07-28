<body style="background-color:	#FFECEC;"> 
<?php
    require("DBconnect.php");

    $product_type=$_POST["product_type"];
    $product_number=$_POST["product_number"];
    $product_remainnumber=$_POST["product_remainnumber"];
    $product_price=$_POST["product_price"];

    $pathpart=pathinfo($_FILES["product_photo"]["name"]);//取得檔案路徑
    $extname=$pathpart["extension"];
    $finalphoto="Car_".time().'.'.$extname;//產生新檔名
    
    $SQL="INSERT INTO product (product_photo,product_type,product_number,product_remainnumber,product_price) VALUES ('$finalphoto','$product_type','$product_number','$product_remainnumber','$product_price')";
    if(copy($_FILES['product_photo']['tmp_name'],$finalphoto)){
        if(mysqli_query($link,$SQL)){
            echo "<script type='text/javascript'>";
            echo "alert('新增產品成功')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('新增產品失敗')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";
        }
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('照片上傳失敗')";
        echo "</script>";
    }
    
   
?>
    

