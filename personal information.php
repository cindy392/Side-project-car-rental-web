<html>
    <head>
        <title>個人資料</title>
        <link rel="stylesheet" href="personal information.css">
    </head>
    <body>    
    <body style="background-color:	#FFECEC;">
    <button value="首頁" class="blue" onclick="location.href='home.php'">首頁</button>
    <button value="產品介紹" class="green" onclick="location.href='show.php'">產品介紹</button>
    <button value="聯絡我們" class="yellow" onclick="location.href='connect.php'">聯絡我們</button>
    <button value="帳戶" class="pink" onclick="location.href='personal information.php'">帳戶</button>
    <button value="購物車" class="orange" onclick="location.href='shop.php'">購物車</button></br>
    <center><div style="font-size: 45px">個人資料</div></center><br>
    <!--<button id='history-botton' class="history" style="float:right;">歷史訂單</button> -->
    

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
    echo "<br>";
            echo "<br>";
    ?>



    
        </div>
    </form>
    <button value="登出" class="out" onclick="location.href='logout.php'">登出</button>
    <button value="歷史訂單" class="history" onclick="location.href='myorder.php'">歷史訂單</button>
    <button value="修改資料" class="history" onclick="location.href='modify_information.php'">修改資料</button>
    </center>
    </body>
</html>