<html>
    <head>
        <title>產品管理</title>
        <link rel="stylesheet" href="commodity.css">
    </head>
    <body> 
        <body style="background-color:	#FFECEC;">
        <button value="客戶管理" class="client1" onclick="location.href='user.php'">客戶管理</button>
        <button value="帳戶管理" class="account1" onclick="location.href='information.php'">帳戶管理</button> 
        <button value="訂單管理" class="order1" onclick="location.href='order.php'">訂單管理</button>
        <button value="產品管理" class="product1" onclick="location.href='commodity.php'">產品管理</button><br>
        <button value="新增產品" class="plus" onclick="location.href='commodity_new.php'">新增產品</button>
        <center><div style="font-size: 45px">產品管理</div></center><br>

<?php
    require("DBconnect.php");//連接到DBconnect.php，可使用裡面的內容及變數
    $SQL="SELECT * FROM product";
    echo "<center>";
    echo "</br></br>";
    if($result=mysqli_query($link,$SQL)){//用表格的形式印出
        echo "<table>";
        echo "<td align="."center"."><strong>產品ID</strong></td>
        <td align="."center"."><strong>產品照片</strong></td>
        <td align="."center"."><strong>產品車款</strong></td>
        <td align="."center"."><strong>產品車輛數量</strong></td>
        <td align="."center"."><strong>產品剩餘數量</strong></td>
        <td align="."center"."><strong>產品價格</strong></td>
        <td></td><td></td>";
        while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
            echo "<tr>";
            //使刪除可以跳頁以及執行刪除的動作
            echo "<td align="."center"."><strong>".$row["product_id"]."</strong></td>
            <td align="."center".">"."<strong><img src=".$row["product_photo"]." width=200></strong></td>
            <td align="."center"."><strong>".$row["product_type"]."</strong></td>
            <td align="."center"."><strong>".$row["product_number"]."</strong></td>
            <td align="."center"."><strong>".$row["product_remainnumber"]."</strong></td>
            <td align="."center"."><strong>".$row["product_price"]."</strong></td>
            <td align="."center"."><strong>
            <a href='commodity_delete.php?product_id=".$row["product_id"]."'>刪除</a></strong></td>
            <td align="."center"."><strong><a href='modify_commodity.php?product_id=".$row["product_id"]."'>修改</strong></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</center>";
    }
    ?>