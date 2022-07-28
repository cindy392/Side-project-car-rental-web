<html>
    <head>
        <title>客戶訂單確認</title>
        <link rel="stylesheet" href="order.css">
    </head>
    <body> 
        <body style="background-color: #FFECEC;">
        <button value="客戶管理" class="client1" onclick="location.href='user.php'">客戶管理</button>
        <button value="帳戶管理" class="account1" onclick="location.href='information.php'">帳戶管理</button> 
        <button value="訂單管理" class="order1" onclick="location.href='order.php'">訂單管理</button>
        <button value="產品管理" class="product1" onclick="location.href='commodity.php'">產品管理</button>

        <center><div style="font-size: 45px">客戶訂單確認</div></center><br>
    <?php
        require("DBconnect.php");//連接到DBconnect.php，可使用裡面的內容及變數
        $UID=$_COOKIE["UID"];
        $SQL="SELECT * FROM userorder";
        echo "<center>";
        if($result=mysqli_query($link,$SQL)){
            echo "<table>";
            echo "<td align="."center"."><strong>客戶訂單id</strong></td>
            <td width=35 align="."center"."><strong>使用者id</strong></td>
            <td align="."center"."><strong>使用者姓名</strong></td>
            <td align="."center"."><strong>產品照片</strong></td>
            <td align="."center"."><strong>產品車款</strong></td>
            <td align="."center"."><strong>訂單車輛數量</strong></td>
            <td width=65 align="."center"."><strong>訂單價格</strong></td>
            <td width=100 align="."center"."><strong>訂單開始時間</strong></td>
            <td width=100  align="."center"."><strong>訂單結束時間</strong></td>
            <td align="."center"."><strong>預定時間</strong></td>
            <td width=80 align="."center"."><strong>下訂單時間</strong></td>
            <td align="."center"."><strong>剩餘時間</strong></td>
            <td width=65 align="."center"."><strong>訂單狀態</strong></td>
            <td></td>
            <td></td>";
            while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
                echo "<tr>";
                //使刪除可以跳頁以及執行刪除的動作
                $order_starttime=$row["order_starttime"];
                $order_endtime=$row["order_endtime"];
                $total=changetime($order_starttime,$order_endtime);
                $remain=remaintime($order_starttime,$order_endtime);
                echo "<td align="."center".">".$row["userorder_id"]."</strong></td>
                <td align="."center"."><strong>".$row["user_id"]."</strong></td>
                <td align="."center"."><strong>".$row["user_name"]."</strong></td>
                <td><strong>"."<img src=".$row["product_photo"]." width=200></strong></td>
                <td align="."center"."><strong>".$row["product_type"]."</strong></td>
                <td align="."center"."><strong>".$row["order_number"]."</strong></td>
                <td align="."center"."><strong>".$row["order_price"]."</strong></td>
                <td align="."center"."><strong>".$row["order_starttime"]."</strong></td>
                <td align="."center"."><strong>".$row["order_endtime"]."</strong></td>
                <td width=200  align="."center"."><strong>".$total."</strong></td>
                <td align="."center"."><strong>".$row["order_date"]."</strong></td>
                <td width=200  align="."center"."><strong>".$remain."</strong></td>
                <td align="."center"."><strong>".$row["order_return"]."</strong></td>
                <td><a href='order_delete.php?userorder_id=".$row["userorder_id"]."'><strong>刪除</a></strong></td>
                <td><a href='modify_order.php?userorder_id=".$row["userorder_id"]."'><strong>修改</strong></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</center>";
        }
        function changetime($order_starttime,$order_endtime){//算出預定時間
            $substract=strtotime($order_endtime)-strtotime($order_starttime);  
                //$s=$substract%60;//秒//0
                $substract=$substract/60;//300
                if($substract>60){
                    $i=(int)$substract%60;//分//0
                    $substract=$substract/60;//5
                    if($substract>24){
                        $h=(int)$substract%24;//時
                        $substract=$substract/24;
                        if($substract>30){
                            $d=(int)$substract%30;//天
                            $substract=$substract/30;
                            if($substract>12){
                                $m=(int)$substract%30;//月
                                $y=(int)$substract/30;//年
                            }else{
                                $m=(int)$substract;
                            }
                        }else{
                            $d=(int)$substract;
                        }
                    }else{
                        $h=(int)$substract;
                    }
                }else{
                    $i=(int)$substract;
                }
                $total="";
                if(isset($y) && $y>0){//輸出
                    $string=(string)$y."年 ";
                    $total=$total.$string;
                }
                if(isset($m) && $m>0){//輸出
                    $string=(string)$m."月 ";
                    $total=$total.$string;
                }
                if(isset($d) && $d>0){//輸出
                    $string=(string)$d."天 ";
                    $total=$total.$string;
                }
                if(isset($h) && $h>0){//輸出
                    $string=(string)$h."小時 ";
                    $total=$total.$string;
                }
                if(isset($i) && $i>0){//輸出
                    $string=(string)$i."分鐘 ";
                    $total=$total.$string;
                }
                return $total;
        }
        function remaintime($order_starttime,$order_endtime){//算出剩餘時間
            $date=date("Y-m-d h:i:s");
            if(strtotime($order_starttime)>strtotime($date)){
                return "未取車";
            }
            if(strtotime($order_endtime)<strtotime($date)){
                return "已取車";
            }
            $substract=strtotime($order_endtime)-strtotime($date);  
                //$s=$substract%60;//秒//0
                $substract=$substract/60;//300
                if($substract>60){
                    $i=(int)$substract%60;//分//0
                    $substract=$substract/60;//5
                    if($substract>24){
                        $h=(int)$substract%24;//時
                        $substract=$substract/24;
                        if($substract>30){
                            $d=(int)$substract%30;//天
                            $substract=$substract/30;
                            if($substract>12){
                                $m=(int)$substract%30;//月
                                $y=(int)$substract/30;//年
                            }else{
                                $m=(int)$substract;
                            }
                        }else{
                            $d=(int)$substract;
                        }
                    }else{
                        $h=(int)$substract;
                    }
                }else{
                    $i=(int)$substract;
                }
                $remain="";
                if(isset($y) && $y>0){//輸出
                    $string=(string)$y."年 ";
                    $remain=$remain.$string;
                }
                if(isset($m) && $m>0){//輸出
                    $string=(string)$m."月 ";
                    $remain=$remain.$string;
                }
                if(isset($d) && $d>0){//輸出
                    $string=(string)$d."天 ";
                    $remain=$remain.$string;
                }
                if(isset($h) && $h>0){//輸出
                    $string=(string)$h."小時 ";
                    $remain=$remain.$string;
                }
                if(isset($i) && $i>0){//輸出
                    $string=(string)$i."分鐘 ";
                    $remain=$remain.$string;
                }
                return $remain;
        }
        ?>
    </body>
</html>