<html>
    <head>
        <title>新增產品</title>
        <link rel="stylesheet" href="commodity.css">
    </head>
    <body>    
        <body style="background-color:	#FFECEC;">
        <button value="客戶管理" class="client1" onclick="location.href='user.php'">客戶管理</button>
        <button value="帳戶管理" class="account1" onclick="location.href='information.php'">帳戶管理</button> 
        <button value="訂單管理" class="order1" onclick="location.href='order.php'">訂單管理</button>
        <button value="產品管理" class="product1" onclick="location.href='commodity.php'">產品管理</button><br>
        <center><div style="font-size: 45px">新增產品</div></center><br> 
    
        <center><form action="commodity_new_confirm.php" method="post" style="width: 80%;" enctype="multipart/form-data">
        <strong>款式</strong><br><input type="file" name="product_photo" accept="image/*" required><br><!--可以阻擋使用者上傳非圖片檔-->	
        <strong>車型</strong><br><input type="text" name="product_type" required><br><br>       
        <strong>出租輛數</strong><br><input type="number" name="product_number" required><br><br>
        <strong>剩餘輛數</strong><br><input type="number" name="product_remainnumber" required><br><br>	
        <strong>價格</strong><br><input type="number" name="product_price" required><br><br>
        <input type="submit" value="提交" style="background: #efe3ef; color: #00000;" /><br><br>
    </form></center>
    </body>
</html>
