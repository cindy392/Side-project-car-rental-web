<?php
//下訂單
    require("DBconnect.php");
    $UID=$_COOKIE["UID"];
    $status=true;//錯誤狀態，查看是否有錯誤發生
    $SQL="SELECT * FROM user WHERE user_id=$UID";//找出user的id,name
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            $user_id=$row["user_id"];
            $user_name=$row["user_name"];                    
        }
    }
    $order_starttime=$_POST["order_starttime"];
    $order_endtime=$_POST["order_endtime"];
    $order_date=date("Y-m-d");
    $date=date("Y-m-d h:i:s");
        if((strtotime($order_starttime)<strtotime($date)) || (strtotime($order_starttime)<strtotime($date))){
            echo "<script type='text/javascript'>";
            echo "alert('填寫的預定時間比現在時間早，請重新填寫')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
            $status=false;
        }
    $order_return="未取車";

    //循環myorder每筆訂單，分別上傳
    $SQL1="SELECT * FROM myorder WHERE user_id=$UID";
    if($result1=mysqli_query($link,$SQL1)){
        while($row1=mysqli_fetch_assoc($result1)){
            if($status==false){
                break;
            }
            $myorder_id=$row1["myorder_id"];
            $product_id=$row1["product_id"];
            $product_photo=$row1["product_photo"];
            $product_type=$row1["product_type"];
            $order_number=$row1["order_number"];
            $order_price=$row1["order_price"];     
            $SQL3="SELECT * FROM product WHERE product_id=$product_id";//找出產品的剩餘數量檢查
            if($result3=mysqli_query($link,$SQL3)){
                while($row3=mysqli_fetch_assoc($result3)){
                    $product_number=$row3["product_number"];
                    $product_remainnumber=$row3["product_remainnumber"];
                    $product_price=$row3["product_price"];         
                }
            }
            echo $order_number;
            echo $product_remainnumber;
            if($product_remainnumber < $order_number){//如果訂單數量大於剩餘數量
                echo "<script type='text/javascript'>";
                echo "alert('訂購數量已超過剩餘產品數量".$order_number.">".$product_remainnumber."')";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
                $status=false;
                break;
            }   

    $SQL2="INSERT INTO userorder (userorder_id,user_id,user_name,product_id,product_photo,product_type,order_number,order_price,order_starttime,order_endtime,order_date,order_return) VALUES ('','$user_id','$user_name','$product_id','$product_photo','$product_type','$order_number','$order_price','$order_starttime','$order_endtime','$order_date','$order_return')";
        if(mysqli_query($link,$SQL2)){//這筆訂單成功
            $SQL4="DELETE FROM myorder WHERE myorder_id='$myorder_id'";//刪掉在myorder裡的這筆訂單
            if(mysqli_query($link,$SQL4)){//刪除成功
                //更新在product的資料
                $product_remainnumber = $product_remainnumber - $order_number;//改剩餘數量
                $SQL5="UPDATE product SET product_photo='$product_photo',product_type='$product_type',product_number='$product_number',product_remainnumber='$product_remainnumber',product_price='$product_price' WHERE product_id='$product_id'";
                if(mysqli_query($link,$SQL5)){
                }else{
                    echo "<script type='text/javascript'>";
                    echo "alert('更新product剩餘數量失敗')";
                    echo "</script>";
                    echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
                    $status=false;
                    break;
                }
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('刪除訂單失敗')";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
                $status=false;
                break;
            }
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('加入訂單失敗')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=shop.php'>";
            $status=false;
            break;
        }
    }
}
if($status){
    echo "<script type='text/javascript'>";
    echo "alert('加入訂單成功')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=myorder.php'>";
}
    ?>