<?php
include_once("common/init.php");
if($_POST['id']){
$id = !empty($_POST['id']) ? intval($_POST['id']) : '0';
}else
{
$id = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : '0';
}
$sums = !empty($_POST['sums']) ? intval($_POST['sums']) : '1';
$info = db_get_row("select * from goods where id=".$_REQUEST["id"]);
if($info['amount']<=$sums){
   echo "<script>alert('该商品数量不够，请重新选择!');history.back();</script>";
   exit;
 }
  $array=explode("@",$_SESSION['producelist']);
  for($i=0;$i<count($array)-1;$i++){
	 if($array[$i]==$id){
	     echo "<script>alert('该商品已经在您的购物车中!');history.back();</script>";
		 exit;
	  }
	}
  $_SESSION['producelist']=$_SESSION['producelist'].$id."@";
  $_SESSION['quatity']=$_SESSION['quatity']."".$sums."@";
  header("location:cart.php");
?>