<?php
    require("DBconnect.php");

    $myorder_id=$_GET["myorder_id"];
    $SQL="DELETE FROM myorder WHERE myorder_id='$myorder_id'";
    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('刪除成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('刪除失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
    }
    ?>