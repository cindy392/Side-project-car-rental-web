
<html>
    <head>
        <title>更新</title>
        <link rel="stylesheet" href="user.css">
    </head>
<body style="background-color:#FFD2D2;">
    <body>
<body style="background-color:#FFD2D2;">
<button value="客戶管理" class="client1" onclick="location.href='user.php'">客戶管理</button>
        <button value="帳戶管理" class="account1" onclick="location.href='information.php'">帳戶管理</button> 
        <button value="訂單管理" class="order1" onclick="location.href='order.php'">訂單管理</button>
        <button value="產品管理" class="product1" onclick="location.href='commodity.php'">產品管理</button>
<center><h1>使用者更新</h1></center>
<?php
    require("DBconnect.php");
    $user_id=$_GET["user_id"];

    echo "<center><font size=\"4\" ><br><strong>使用者ID：".$user_id;"<strong></br></font></center>";
    $SQL="SELECT * FROM user WHERE user_id='$user_id'";
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            $user_name=$row["user_name"];
            $user_account=$row["user_account"];
            $user_password=$row["user_password"];
            $user_birth=$row["user_birth"];
            $user_address=$row["user_address"];
            $user_email=$row["user_email"];
            $user_phone=$row["user_phone"];
            $user_photo=$row["user_photo"];
            $user_date=$row["user_date"];
        }
    }
    ?>
<center>

    <form action="modify_user_confirm.php" method="post" style="width: 80%;" enctype="multipart/form-data">
    <strong>User number</strong><br><?php echo $user_id;?><br>
        <input type="hidden" name='user_id' value='<?php echo $user_id;?>';>
        <strong>姓名</strong><br><input type="text" name="user_name" value='<?php echo $user_name;?>'><br><br>
        <strong>生日</strong><br><input type="date" name="user_birth" value='<?php echo $user_birth;?>'><br><br>
        <strong>地址</strong><br><input type="text" name="user_address" value='<?php echo $user_address;?>'><br><br>
        <strong>Email</strong><br><input type="email" name="user_email" value='<?php echo $user_email;?>'><br><br>
        <strong>電話</strong><br><input type="tel" name="user_phone" value='<?php echo $user_phone;?>'><br><br>
        <strong>帳號</strong><br><input type="text" name="user_account" value='<?php echo $user_account;?>'><br><br>
        <strong>密碼</strong><br><input type="password" name="user_password" value='<?php echo $user_password;?>'><br><br>
        <strong>駕照</strong><br><input type="file" name="user_photo" accept="image/*" value='<?php echo $user_photo;?>'><br><!--可以阻擋使用者上傳非圖片檔-->	
        <br><br>
        <input type="submit"><br><br>
        </form>
        </center>
    