<body style="background-color:#FFD2D2;">
<?php
    require("DBconnect.php");
    //接收表單數值
    $product_id=$_POST["product_id"];
    $product_type=$_POST["product_type"];
    $product_number=$_POST["product_number"];
    $product_remainnumber=$_POST["product_remainnumber"];
    $product_price=$_POST["product_price"];

    $pathpart=pathinfo($_FILES["product_photo"]["name"]);//取得檔案路徑
    $extname=$pathpart["extension"];
    $finalphoto="Car_".time().'.'.$extname;//產生新檔名

    $SQL="UPDATE product SET product_photo='$finalphoto',product_type='$product_type',product_number='$product_number',product_remainnumber='$product_remainnumber',product_price='$product_price' WHERE product_id='$product_id'";
    
    if(copy($_FILES['product_photo']['tmp_name'],$finalphoto)){//對話框
        if(mysqli_query($link,$SQL)){
            echo "<script type='text/javascript'>";
            echo "alert('更新成功')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('更新失敗')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";
        }
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('照片上傳失敗')";
        echo "</script>";
    }
    ?>