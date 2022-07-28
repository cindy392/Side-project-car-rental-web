<html>
    <head>
        <title>忘記密碼</title>
    </head>
    <body style="background-color:	#FFECEC;">   
        <center><h1>忘記密碼</h1></center>
        <center><form action="mailsend.php" method="post" style="width: 80%;" enctype="multipart/form-data">
        <strong>帳號</strong></br><input type="text" name="user_account" placeholder="Account" required><br><br>
        <strong>Email</strong></br><input type="email" name="user_email" placeholder="email" required><br><br>
        <strong>身分</strong></br><input type='radio' name='user_role' value='user' checked>用戶登入<input type='radio' name='user_role' value='admin'>後台登入</br>
            <input type="submit"><br><br>
        </form></center>
    </body>
</html>