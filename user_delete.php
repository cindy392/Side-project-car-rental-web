<body style="background-color:#FFD2D2;">
<?php
    require("DBconnect.php");
    $user_id=$_GET["user_id"];
    echo "<center><br>$user_id<strong></br></center>";
    $SQL="DELETE FROM user WHERE user_id='$user_id'";
    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('刪除成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=user.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('刪除失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=user.php'>";
    }
    ?>
    