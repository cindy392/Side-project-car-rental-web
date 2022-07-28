<body style="background-color:#FFD2D2;">
<?php
//下訂單
    require("DBconnect.php");
    //echo "<center><font size=\"4\" ><br><strong>使用者ID：".$user_id;"<strong></br></font></center>";
    $UID=$_COOKIE["UID"];
    $SQL="SELECT * FROM myorder WHERE user_id=$UID";
    if($result=mysqli_query($link,$SQL)){//抓取myorder裡商品的變數
        while($row=mysqli_fetch_assoc($result)){
            $user_id=$row["user_id"];
            $product_id=$row["product_id"];
            $product_photo=$row["product_photo"];
            $product_type=$row["product_type"];
            $product_price=$row["product_price"];
            $order_number=$row["order_number"];
            $order_price=$row["order_price"];           
        }
    }
    ?>	
<center>
    <h1>訂單內容</h1>
    <?php
    $total_price=0;
    if($result=mysqli_query($link,$SQL)){//用表格的形式印出myorder訂單商品的內容
        echo "<table border='1'>";
        echo "<td align="."center"." bgcolor ="."#FF9797"."><strong>產品照片</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品車款</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品價格</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>訂單數量</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>訂單價格</strong></td>";
        while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
            echo "<tr>";
            echo "<td align="."center".">"."<img src=".$row["product_photo"]." width=200></td><td align="."center".">".$row["product_type"]."</td><td align="."center".">".$row["product_price"]."</td><td align="."center".">".$row["order_number"]."</td><td align="."center".">".$row["order_price"]."</td>";
            echo "</tr>";
            $total_price=$total_price+$row["order_price"];
        }
        echo "</table><br>";
    }

    ?>
    <center>
    <form action="toorder_confirm.php" method="post" style="width: 80%;" enctype="multipart/form-data">
        總金額：<?php echo $total_price;?><br>
        <br>
        租車開始時間：<input type="datetime-local" name="order_starttime" value="2022-06-17T08:30"><br><br>
        租車結束時間：<input type="datetime-local" name="order_endtime" value="2022-06-17T13:30"><br><br> 
        <input type="submit"><br><br>
        </form>
        </center>
        
	

