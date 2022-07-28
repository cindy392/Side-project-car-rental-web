<html>
    <head>
        <title>登入</title>
        <link rel="stylesheet" href="personal information.css">
    </head>
    <body>    
    <body style="background-color:	#FFECEC;">
    <button value="首頁" class="blue" onclick="location.href='home.php'">首頁</button>
    <button value="產品介紹" class="green" onclick="location.href='show.php'">產品介紹</button>
    <button value="聯絡我們" class="yellow" onclick="location.href='connect.php'">聯絡我們</button>
    <button value="帳戶" class="pink" onclick="location.href='personal information.php'">帳戶</button>
    <button value="購物車" class="orange" onclick="location.href='shop.php'">購物車</button></br>
    

    <center><div style="font-size: 45px">歡迎登入</div></center><br>
    <?php echo "<body bgcolor='#cefafb'>" ;?>
    <center><form action="register_confirm.php" method="post" style="width: 80%;" enctype="multipart/form-data">
        
        <div style="font-size: 20px">    
        <strong>帳號</strong></br>
        <input type="text" name="user_account" placeholder="Account" required><br><br>
        <strong>密碼</strong></br>
        <input type="password" name="user_password" placeholder="Password" required><br><br>
        <strong>身分</strong></br>
        <input type='radio' name='user_role' value='user' checked>
        <strong>用戶登入</strong><input type='radio' name='user_role' value='admin'>
        <strong>後台登入</strong></br>
        <input type="submit">
        <input type="button" value="註冊" onclick="location.href='enroll.php'">
        <input type="button" value="忘記密碼" onclick="location.href='forget.php'">
        </div>
    </form></center>