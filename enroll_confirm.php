<body style="background-color:	#FFECEC;"> 
    <?php
    require("DBconnect.php");

    $user_name=$_POST["user_name"];
    $user_account=$_POST["user_account"];
    $user_password=$_POST["user_password"];
    $user_birth=$_POST["user_birth"];
    $user_address=$_POST["user_address"];
    $user_email=$_POST["user_email"];
    $user_phone=$_POST["user_phone"];

    $pathpart=pathinfo($_FILES["user_photo"]["name"]);//取得檔案路徑
    $extname=$pathpart["extension"];
    $now=date("Y-m-d");
    $finalphoto="Photo_".time().'.'.$extname;//產生新檔名
    
    $SQL="INSERT INTO user (user_role,user_name,user_account,user_password,user_birth,user_address,user_email,user_phone,user_photo,user_date) VALUES ('user','$user_name','$user_account','$user_password','$user_birth','$user_address','$user_email','$user_phone','$finalphoto','$now')";//將圖片路徑加入資料庫
    if(copy($_FILES['user_photo']['tmp_name'],$finalphoto)){
        if(mysqli_query($link,$SQL)){
            setcookie("UID",$row["user_id"],time()+17280);
            echo "<script type='text/javascript'>";
            echo "alert('註冊成功')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=index.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('註冊失敗')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=enroll.php'>";
        }
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('照片上傳失敗')";
        echo "</script>";
    }
    
   
?>
    

