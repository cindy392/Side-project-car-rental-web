<?php
    setcookie("ID",$id,time()-3600);//刪除cookie
    header("Location:index.php");
    ?>