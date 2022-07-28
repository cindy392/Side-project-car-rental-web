<html>
    <head>
        <title>車款介紹</title>
        <link rel="stylesheet" href="show.css">
    </head>

<body style="background-color:	#FFECEC;">
<button value="首頁" class="blue" onclick="location.href='home.php'">首頁</button>
<button value="產品介紹" class="green" onclick="location.href='show.php'">產品介紹</button>
<button value="聯絡我們" class="yellow" onclick="location.href='connect.php'">聯絡我們</button>
<button value="帳戶" class="pink" onclick="location.href='personal information.php'">帳戶</button>
<button value="購物車" class="orange" onclick="location.href='shop.php'">購物車</button></br>
<center><h1>車款介紹</h1></center>


<?php
    if(isset($_COOKIE["UID"])){
        $UID=$_COOKIE["UID"];
        
        echo "<center><font size=\"4\" color=\"#FF2D2D\"><strong>感謝".$UID."</br>～回到本系統～</strong></center></font>";
        //echo "<center><strong><h3>感謝</h3></strong><center><h3>".$UID."</h3></center><center><strong><h3>～回到本系統～</h3></strong></center>";
    }else{
        echo "<center><strong>～歡迎初次來本系統～</strong></center>";
    }
    require("DBconnect.php");//連接到DBconnect.php，可使用裡面的內容及變數
    $SQL="SELECT * FROM product";
    echo "<center>";
    if($result=mysqli_query($link,$SQL)){//用表格的形式印出
        echo "<table border='2'>";
        
        echo "
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品照片</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品車款</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品車輛數量</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品剩餘數量</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品價格</strong></td>;
        <td align="."center"." bgcolor ="."#FF9797"."><strong>加入購物車</strong></td>";


        while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
            echo "<tr>";
            //使刪除可以跳頁以及執行刪除的動作
            echo "<td>"."<img src=".$row["product_photo"]." width=200></td>
            <td align="."center"."><strong>".$row["product_type"]."</strong></td>
            <td align="."center"."><strong>".$row["product_number"]."</strong></td>
            <td align="."center"."><strong>".$row["product_remainnumber"]."</strong></td>
            <td align="."center"."><strong>".$row["product_price"]."</strong></td>
            <td align="."center"."><a href='toshop.php?product_id=".$row["product_id"]."'><strong>確定</strong></a></td>";
        

            echo "</tr>";
        }
        echo "</table>";  
        echo "</center>";
    }
    ?>