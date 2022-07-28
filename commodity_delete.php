<body style="background-color:	#FFECEC;"> 
<?php
    require("DBconnect.php");

    $product_id=$_GET["product_id"];
    $SQL="DELETE FROM product WHERE product_id='$product_id'";
    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('刪除成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('刪除失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";
    }
    ?>