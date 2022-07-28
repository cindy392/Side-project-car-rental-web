<html lang="Zh-TW">
    <head>
        <title>更改數量</title>
        <link rel="stylesheet" href="shop.css">
        <meta charset="utf-8">
    </head>
    <body style="background-color:	#FFECEC;">
    <button value="首頁" class="blue" onclick="location.href='home.php'">首頁</button>
<button value="產品介紹" class="green" onclick="location.href='show.php'">產品介紹</button>
<button value="聯絡我們" class="yellow" onclick="location.href='connect.php'">聯絡我們</button>
<button value="帳戶" class="pink" onclick="location.href='personal information.php'">帳戶</button>
<button value="購物車" class="orange" onclick="location.href='shop.php'">購物車</button></br></br>
<button value="前一頁" class="green" onclick="location.href='shop.php'">前一頁</button>
<?php
//購物車修改商品數量
    require("DBconnect.php");
    $myorder_id=$_GET["myorder_id"];
    $SQL="SELECT * FROM myorder WHERE myorder_id='$myorder_id'";
    if($result=mysqli_query($link,$SQL)){
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
    echo "<center>";
    if($result=mysqli_query($link,$SQL)){//用表格的形式印出
        echo "<table>";
        echo "<td>產品照片</td><td>產品車款</td><td>產品價格</td>";
        while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
            echo "<tr>";
            echo "<td>"."<img src=".$row["product_photo"]." width=200></td><td>".$row["product_type"]."</td><td>".$row["product_price"]."</td>";
            echo "</tr>";
        }
        echo "</table><br><br></center>";
    }
    ?>
<center>
    <h1>修改商品數量</h1>
    <form action="shop_changenumber_confirm.php" method="post" style="width: 80%;" enctype="multipart/form-data">
        <input type="hidden" name='myorder_id' value='<?php echo $myorder_id;?>'>
        <input type="hidden" name='user_id' value='<?php echo $user_id;?>'>
        <input type="hidden" name='product_id' value='<?php echo $product_id;?>'>
        <input type="hidden" name='product_photo' value='<?php echo $product_photo;?>'>
        <input type="hidden" name='product_type' value='<?php echo $product_type;?>'>
        <input type="hidden" name='product_price' value='<?php echo $product_price;?>'>
        商品數量：<input type="number" name="order_number" value='<?php echo $order_number;?>'><br><br>
        <br>
        <input type="submit" value="提交" style="background: #F00078; color: #fff;" /><br><br>
        </form>
        </center>
</body>
</html>
    