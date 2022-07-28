<body style="background-color:#FFD2D2;">
<?php
//產品修改內容
    require("DBconnect.php");
    $product_id=$_GET["product_id"];
    echo "產品ID：".$product_id;
    $SQL="SELECT * FROM product WHERE product_id='$product_id'";
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            $product_photo=$row["product_photo"];
            $product_type=$row["product_type"];
            $product_number=$row["product_number"];
            $product_remainnumber=$row["product_remainnumber"];
            $product_price=$row["product_price"];
        }
    }
    ?>
<center>
    <h1>產品更新</h1>
    <form action="modify_commodity_confirm.php" method="post" style="width: 80%;" enctype="multipart/form-data">
        product id：<?php echo $product_id;?><br>
        <input type="hidden" name='product_id' value='<?php echo $product_id;?>'>
        款式：<input type="file" name="product_photo" accept="image/*" value='<?php echo $product_photo;?>'><br>
        車型：<input type="text" name="product_type" value='<?php echo $product_type;?>'><br><br>       
        出租輛數：<input type="number" name="product_number" value='<?php echo $product_number;?>'><br><br>
        剩餘輛數：<input type="number" name="product_remainnumber" value='<?php echo $product_remainnumber;?>'><br><br>
        價格：<input type="number" name="product_price" value='<?php echo $product_price;?>'><br><br>
        <br><br>
        <input type="submit"><br><br>
        </form>
        </center>
    