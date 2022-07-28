
<html lang="Zh-TW">
    <head>
        <title>修改使用者訂單</title>
        <link rel="stylesheet" href="user.css">
        <meta charset="utf-8">
    </head>
    <body> 
        <body style="background-color:	#FFECEC;">
        <button value="客戶管理" class="client1" onclick="location.href='user.php'">客戶管理</button>
        <button value="帳戶管理" class="account1" onclick="location.href='information.php'">帳戶管理</button> 
        <button value="訂單管理" class="order1" onclick="location.href='order.php'">訂單管理</button>
        <button value="產品管理" class="product1" onclick="location.href='commodity.php'">產品管理</button>
        <?php
//修改使用者訂單
    require("DBconnect.php");
    $userorder_id=$_GET["userorder_id"];
    $SQL="SELECT * FROM userorder WHERE userorder_id=$userorder_id";
    if($result=mysqli_query($link,$SQL)){//抓取myorder裡商品的變數
        while($row=mysqli_fetch_assoc($result)){
            $user_id=$row["user_id"];
            $user_name=$row["user_name"];
            $product_id=$row["product_id"];
            $product_photo=$row["product_photo"];
            $product_type=$row["product_type"];
            $order_number=$row["order_number"];
            $order_price=$row["order_price"];
            $order_starttime=$row["order_starttime"];
            $order_endtime=$row["order_endtime"];
            $order_date=$row["order_date"];
            $order_return=$row["order_return"];           
        }
    }
    ?>	
<center>
    <h1>修改使用者訂單內容</h1>
    <?php
    $total_price=0;
    if($result=mysqli_query($link,$SQL)){//用表格的形式印出myorder訂單商品的內容
        echo "<table border='1'>";
        echo "
            <td width=35 align="."center"."><strong>使用者id</strong></td>
            <td align="."center"."><strong>使用者姓名</strong></td>
            <td align="."center"."><strong>客戶訂單id</strong></td>
            <td align="."center"."><strong>產品照片</strong></td>
            <td align="."center"."><strong>產品車款</strong></td>
            <td align="."center"."><strong>訂單車輛數量</strong></td>
            <td width=65 align="."center"."><strong>訂單價格</strong></td>
            <td width=100 align="."center"."><strong>訂單開始時間</strong></td>
            <td width=100  align="."center"."><strong>訂單結束時間</strong></td>
            <td width=100  align="."center"."><strong>訂單狀態</strong></td>       ";
        while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
            echo "<tr>";
            echo "<td>".$row["user_id"]."</td><td>".$row["user_name"]."</td><td>".$row["product_id"]."</td><td>"."<img src=".$row["product_photo"]." width=200></td><td>".$row["product_type"]."</td><td>".$row["order_number"]."</td><td>".$row["order_price"]."</td><td>".$row["order_starttime"]."</td><td>".$row["order_endtime"]."</td><td>".$row["order_return"]."</td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }

    ?>
    <center>
    <form action="modify_order_confirm.php" method="post" style="width: 80%;" enctype="multipart/form-data">
    <input type="hidden" name='userorder_id' value='<?php echo $userorder_id;?>';>
        出租輛數：<input type="number" name="order_number" required><br><br>
        租車開始時間：<input type="datetime-local" name="order_starttime" value="2022-06-16T12:30"><br><br>
        租車結束時間：<input type="datetime-local" name="order_endtime" value="2022-06-16T13:30"><br><br> 
        訂單狀態：<input type="text" name="order_return" required><br><br>
        <input type="submit"><br><br>
        </form>
        </center>      