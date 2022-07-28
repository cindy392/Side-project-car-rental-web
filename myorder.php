
<html>
    <head>
        <title>我的所有訂單</title>
        <link rel="stylesheet" href="myorder.css">
    </head>
<body style="background-color:#FFD2D2;">
    <body>
        <button value="前一頁" class="back" onclick="location.href='personal%20information.php'">前一頁</button>
<?php
    require("DBconnect.php");//連接到DBconnect.php，可使用裡面的內容及變數
    $UID=$_COOKIE["UID"];
    $SQL="SELECT * FROM userorder WHERE user_id=$UID";
    echo "<center>";
    echo "<h1>我的所有訂單</h1>";
    if($result=mysqli_query($link,$SQL)){
        echo "<table border='1'>";
        echo "<td align="."center"." bgcolor ="."#FF9797"."><strong>使用者姓名</td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品照片</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>產品車款</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>訂單數量</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>訂單價格</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>訂單開始時間</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>訂單結束時間</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>預定時間</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>下訂日期</strong></td>
        <td align="."center"." bgcolor ="."#FF9797"."><strong>剩餘時間</strong></td>
        <td bgcolor ="."#FF9797"."><strong>訂單狀態</strong></td>";
        while($row=mysqli_fetch_assoc($result)){//只要裡面有內容
            echo "<tr>";
            //使刪除可以跳頁以及執行刪除的動作
            $order_starttime=$row["order_starttime"];
            $order_endtime=$row["order_endtime"];
            $total=changetime($order_starttime,$order_endtime);
            $remain=remaintime($order_starttime,$order_endtime);
            echo "<td align="."center".">".$row["user_name"]."</td><td>"."<img src=".$row["product_photo"]." width=200></td><td align="."center".">".$row["product_type"]."</td><td align="."center".">".$row["order_number"]."</td><td align="."center".">".$row["order_price"]."</td><td align="."center".">".$row["order_starttime"]."</td><td align="."center".">".$row["order_endtime"]."</td><td width=200  align="."center".">".$total."</td><td align="."center".">".$row["order_date"]."</td><td width=200  align="."center".">".$remain."</td><td align="."center".">".$row["order_return"]."</td>";
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