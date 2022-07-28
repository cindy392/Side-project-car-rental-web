<html>
    <head>
        <title>購物車</title>
        <link rel="stylesheet" href="shop.css">
    </head>

<body style="background-color:	#FFECEC;">
<button value="首頁" class="blue" onclick="location.href='home.php'">首頁</button>
<button value="產品介紹" class="green" onclick="location.href='show.php'">產品介紹</button>
<button value="聯絡我們" class="yellow" onclick="location.href='connect.php'">聯絡我們</button>
<button value="帳戶" class="pink" onclick="location.href='personal information.php'">帳戶</button>
<button value="購物車" class="orange" onclick="location.href='shop.php'">購物車</button></br>
<center><h1>購物車</h1></center>

<?php
    require("DBconnect.php");//連接到DBconnect.php，可使用裡面的內容及變數
    $UID=$_COOKIE["UID"];
    $SQL="SELECT * FROM myorder WHERE user_id=$UID";
    echo "<center>";
    echo "<h3>選定車款</h3>";
    if($result=mysqli_query($link,$SQL)){//用表格的形式印出
        echo "<table border='1'>";
        echo 
        "<td align="."center"." bgcolor ="."#FF9797"."><strong>產品照片</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品車款</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品價格</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>訂單數量</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>訂單價格</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong></strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong></strong></td>";
        while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
            echo "<tr>";
            echo 
            "<td>"."<img src=".$row["product_photo"]." width=200></td>
            <td align="."center"."><strong>".$row["product_type"]."</strong></td>
            <td align="."center"."><strong>".$row["product_price"]."</strong></td>
            <td align="."center"."><strong>".$row["order_number"]."</strong></td>
            <td align="."center"."><strong>".$row["order_price"]."</strong></td>
            <td align="."center"."><strong>
            <a href='shop_changenumber.php?myorder_id=".$row["myorder_id"]."'>更改數量</strong></a></td>
            <td align="."center"."><strong>
            <a href='shop_delete.php?myorder_id=".$row["myorder_id"]."'>刪除</a></strong></td>";
            echo "</tr>";
        }
        echo "</table><br><br>";
    }
    ?>
    <button value="下訂單" class="buy" onclick="location.href='toorder.php'">下訂單</button>

</center>