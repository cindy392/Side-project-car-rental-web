<?php
    require("DBconnect.php");

    $userorder_id=$_GET["userorder_id"];
    $SQL="DELETE FROM userorder WHERE userorder_id='$userorder_id'";
    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('刪除成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=order.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('刪除失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=order.php'>";
    }
    ?>
