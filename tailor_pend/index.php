<?php session_start();
if(@$_SESSION['welcome'] !=""){
    echo @$_SESSION['welcome'];
    @$_SESSION['welcome'] = "";
}

if(@$_SESSION['delvered'] !=""){
    echo @$_SESSION['delivered'];
    @$_SESSION['delivered'] = "";
}


?>

<?php
include 'connecion.php'
?>


 <?php
       
 $countA = mysqli_query($link, "SELCT COUNT(status) as totala FROM booktable WHERE status = 'Pending'");
 while ($row4 = mysqli_fetch($countA)){
     $count_pending = $row4['totala'];
 }
 if($count_pending ==""){
     $count_pending = 0;
 }
 
 
        ?>








<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <li> <a href="request_alert.php">Request Alert<b style=""><?php echo"$count_pending"; ?></b></a></li>
    </body>
</html>
