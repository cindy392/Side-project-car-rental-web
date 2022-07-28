<html>
    <head>
        <title>個人資料</title>
    </head>
    <body style="background-color:	#FFECEC;">       
    <div style="float:right">
        <link rel="stylesheet" href="user.css">
    </div>
    <button value="客戶管理" class="client1" onclick="location.href='user.php'">客戶管理</button>
        <button value="帳戶管理" class="account1" onclick="location.href='information.php'">帳戶管理</button> 
        <button value="訂單管理" class="order1" onclick="location.href='order.php'">訂單管理</button>
        <button value="產品管理" class="product1" onclick="location.href='commodity.php'">產品管理</button>
    <center><h1>個人資料</h1>
    <?php
    require("DBconnect.php");//連接到DBconnect.php，可使用裡面的內容及變數
    $UID=$_COOKIE["UID"];
    $SQL="SELECT * FROM user WHERE user_id=$UID";
    echo "<center>";
    echo "<table width=50%>";
    if($result=mysqli_query($link,$SQL)){//用表格的形式印出
        while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
            echo "<tr>";
            echo "<td align="."center".">姓名</td><td align="."center".">".$row["user_name"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align="."center".">生日</td><td align="."center".">".$row["user_birth"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align="."center".">地址</td><td align="."center".">".$row["user_address"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align="."center".">Email</td><td align="."center".">".$row["user_email"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align="."center".">電話</td><td align="."center".">".$row["user_phone"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align="."center".">帳號</td><td align="."center".">".$row["user_account"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align="."center".">駕照</td><td>"."<img src=".$row["user_photo"]." width=200></td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    echo "</center>";
    echo "<br>";
            echo "<br>";
    ?>
    <button value="修改資料" class="pink" onclick="location.href='modify_information.php'">修改資料</button>   
    <button value="登出" class="pink" onclick="location.href='logout.php'">登出</button></br>
    </center> 
    </body>
</html>