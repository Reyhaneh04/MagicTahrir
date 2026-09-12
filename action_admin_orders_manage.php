<?php
include ("includes/header.php");
     if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true && $_SESSION["user_type"]=="admin")){//بررسی مدیر بودن کاربر
?>
<script type="text/javascript">
	<!--
	location.replace("index.php");//انتقال به صفحه index
	-->
</script>
<?php
}//ifپایان

$link = mysqli_connect("localhost","root","","shop_db");//اتصال به پایگاه داده

if (mysqli_connect_errno())
	exit("خطایی با شرح زیر رخ داده است:".mysqli_connect_error());//نمایش خطا اگر وجود داشته باشد

if (isset($_GET['action'])){
	
	$id = $_GET['id'];
	
	switch ($_GET['action']){//بررسی حالت های مختلف
	   case 'Checking':
			$query = "UPDATE orders SET state='0' WHERE id='$id'";//فیلد state به 0 ویرایش میشود
	   break;
		
	   case 'Readytosend':
			$query = "UPDATE orders SET state='1' WHERE id='$id'";//فیلد state به 1 ویرایش میشود
	   break; 
			
	   case 'Posted':
			$query = "UPDATE orders SET state='2' WHERE id='$id'";//فیلد state به 2 ویرایش میشود
	   break; 
	   
	   case 'Cancel':
			$query = "UPDATE orders SET state='3' WHERE id='$id'";//فیلد state به 3 ویرایش میشود
	   break; 
    }
	
	mysqli_query($link,$query);//اجرای پرسوجو
	
	mysqli_close($link);//قطع کردن ارتباط با پایگاه داده
	
}

?>
<script type="text/javascript">
	<!--
	location.replace("admin_orders_manage.php");
	-->
</script>
<?php
include ("includes/footer.php");
?>