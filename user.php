<html lang="Zh-TW">
    <head>
        <title>客戶管理</title>
        <link rel="stylesheet" href="user.css">
        <meta charset="utf-8">
    </head>
    <body> 
        <body style="background-color:	#FFECEC;">
        <button value="客戶管理" class="client1" onclick="location.href='user.php'">客戶管理</button>
        <button value="帳戶管理" class="account1" onclick="location.href='information.php'">帳戶管理</button> 
        <button value="訂單管理" class="order1" onclick="location.href='order.php'">訂單管理</button>
        <button value="產品管理" class="product1" onclick="location.href='commodity.php'">產品管理</button>

        <center><div style="font-size: 45px">客戶管理</div></center><br> 

<?php

    require("DBconnect.php");//連接到DBconnect.php，可使用裡面的內容及變數
    $SQL="SELECT * FROM user";
    echo "<center>";
    echo "<body bgcolor='#FFF8D7'>" ;
    if($result=mysqli_query($link,$SQL)){//用表格的形式印出
        echo "<table border='3'>";
        echo "<td align="."center"." bgcolor ="."#FFD2D2"."><b>使用者id</b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者身分</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者姓名</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者帳號</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者密碼</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者生日</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者地址</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者email</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者電話</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者駕照</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."><b><strong>使用者加入日期</strong></b></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."></td>
        <td align="."center"." bgcolor ="."#FFD2D2"."></td>";
        while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
            echo "<tr>";
            //使刪除可以跳頁以及執行刪除的動作 
            echo 

            "<td align="."center"." bgcolor ="."#FFECF5"."><b><strong>".$row["user_id"]."</strong></b></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>".$row["user_role"]."</strong></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>".$row["user_name"]."</strong></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>".$row["user_account"]."</strong></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>".$row["user_password"]."</strong></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>".$row["user_birth"]."</strong></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>".$row["user_address"]."</strong></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>".$row["user_email"]."</strong></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>".$row["user_phone"]."</strong></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>"."<img src=".$row['user_photo']." width=100></strong></td>
            <td align="."center"." bgcolor ="."	#FFECF5"."><strong>".$row["user_date"]."</strong></td>
            <td bgcolor ="."#FFECF5"."><strong><a href='user_delete.php?user_id=".$row["user_id"]."'></strong><strong>刪除</strong></a></td>
            <td bgcolor ="."#FFECF5"."><strong><a href='modify_user.php?user_id=".$row["user_id"]."'></strong><strong>修改</strong></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</center>";
    }
    ?>
    </html>
