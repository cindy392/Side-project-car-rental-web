<body style="background-color:#FFD2D2;">
<?php
    require("DBconnect.php");
    $user_id=$_POST["user_id"];
    $user_name=$_POST["user_name"];
    $user_account=$_POST["user_account"];
    $user_password=$_POST["user_password"];
    $user_birth=$_POST["user_birth"];
    $user_address=$_POST["user_address"];
    $user_email=$_POST["user_email"];
    $user_phone=$_POST["user_phone"];
    $user_date=date("Y-m-d");
    //產生照片
    $pathpart=pathinfo($_FILES["user_photo"]["name"]);//取得檔案路徑
    $extname=$pathpart["extension"];
    $finalphoto="Photo_".time().'.'.$extname;//產生新檔名

    $SQL="UPDATE user SET user_name='$user_name',user_account='$user_account',user_password='$user_password',user_birth='$user_birth',user_address='$user_address',user_email='$user_email',user_phone='$user_phone',user_photo='$finalphoto',user_date='$user_date' WHERE user_id='$user_id'";
    
    if(copy($_FILES['user_photo']['tmp_name'],$finalphoto)){
        if(mysqli_query($link,$SQL)){
            echo "<script type='text/javascript'>";
            echo "alert('更新成功')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=information.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('更新失敗')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=information.php'>";
        }
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('照片上傳失敗')";
        echo "</script>";
    }
    ?>