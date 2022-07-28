<html>
    <head>
        <title>註冊</title>
    </head>
    <body style="background-color:	#FFECEC;">   
    <center><h1>註冊</h1></center>
    <center><form action="enroll_confirm.php" method="post" style="width: 80%;" enctype="multipart/form-data">
    <strong>姓名</strong></br><input type="text" name="user_name" placeholder="userid" required><br><br>
    <strong>生日</strong></br><input type="date" name="user_birth" placeholder="userid" required><br><br>
    <strong>地址</strong></br><input type="text" name="user_address" placeholder="userid" required><br><br>
    <strong>Email</strong></br><input type="email" name="user_email" placeholder="email" required><br><br>
    <strong>電話</strong></br><input type="tel" name="user_phone" placeholder="phone-number" required><br><br>
    <strong>帳號</strong></br><input type="text" name="user_account" placeholder="userid" required><br><br>
    <strong>密碼</strong></br><input type="password" name="user_password" placeholder="password" required><br><br>
    <strong>駕照</strong></br><input type="file" name="user_photo" accept="image/*" required><br><!--可以阻擋使用者上傳非圖片檔-->	
        <input type="submit"><br><br>
    </form></center>
    </body>
</html>