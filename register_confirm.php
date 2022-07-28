<body style="background-color:#FFD2D2;">
<?php
    require("DBconnect.php");//連接到DBconnect.php，可使用裡面的內容及變數

    if(isset($_POST["user_account"]) && isset($_POST["user_password"]) && isset($_POST["user_role"])){
        if($_POST["user_account"]!=null && $_POST["user_password"]!=null && $_POST["user_role"]!=null){
            $user_account=$_POST["user_account"];
            $user_password=$_POST["user_password"];
            $user_role=$_POST["user_role"];
            $SQL="SELECT * FROM user WHERE user_account='$user_account' AND user_password='$user_password' AND user_role='$user_role'";
            $result=mysqli_query($link,$SQL);
            if(mysqli_num_rows($result)==1){//查詢完的結果是否只有1行
                if($user_role=='user'){//sql是找user_id出來
                    $sql="SELECT user_id FROM user WHERE user_account='$user_account' AND user_password='$user_password' AND user_role='$user_role'";
                    $sqlresult=mysqli_query($link,$sql);//搜尋結果
                    $row=mysqli_fetch_assoc($result);//抓取每欄位的內容
                    setcookie("UID",$row["user_id"],time()+17280);
                    header("Location:home.php");
                }else{
                    $sql="SELECT user_id FROM user WHERE user_account='$user_account' AND user_password='$user_password' AND user_role='$user_role'";
                    $sqlresult=mysqli_query($link,$sql);//搜尋結果
                    $row=mysqli_fetch_assoc($result);//抓取每欄位的內容
                    setcookie("UID",$row["user_id"],time()+17280);
                    header("Location:back.php");
                }
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('登入失敗')";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=index.php'>";
            }
        }else{
            echo "<script type='text/javascript'>";
                echo "alert('未填寫完成')";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=index.php'>";
        }
    }else{
        echo "<script type='text/javascript'>";
                echo "alert('未填寫完成')";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=index.php'>";
    }
    
?>