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

    $query = "SELECT * FROM orders";//پرس و جو برای تمام فیلدهای جدول orders
	$result = mysqli_query($link,$query);//اجرای پرس و جو
?>

<table border="1px" style="width: 100%;font-family:b nazanin;font-size: 15pt;text-align: center;">
	
	<?php 
	
	while ($row = mysqli_fetch_array($result)){//سطر جدول را در متغیر رایه ای میریزیم
			?>
       <tr bgcolor="<?php if ($row['state']=='3') echo('darksalmon'); else echo('violet'); //با توجه به فیلد state رنگ تغییر کند ?> ">
	       <td>کد سفارش</td>
	       <td>نام خریدار</td>
	       <td>نام محصول</td>
	       <td>تاریخ سقارش</td>
	       <td>تعداد سفارش</td>
	       <td>قیمت کالا</td>
	       <td>قیمت نهایی</td>
	   </tr>
	  <tr>
		  <td><?php echo($row['id']) ?></td>
		  <td>
			  <?php
				
				$query = "SELECT * FROM users WHERE username='{$row['username']}' ";//ایجاد پرسوجو براساس نام کاربری
		        $result_users = mysqli_query($link,$query);
				$row_users = mysqli_fetch_array($result_users);//سطر را در یک متغیر رایه ای میریزیم
		        echo ($row_users['realname']);
		
				?>
		  </td>
		  <td>
			  <?php
				
				$query = "SELECT * FROM products WHERE pro_code='{$row['pro_code']}' ";//ایجاد پرسوجو براساس کدکالا 
		        $result_pro = mysqli_query($link,$query);
				$row_pro=mysqli_fetch_array($result_pro);//سطر را در یک متغیر رایه ای میریزیم
		        echo ($row_pro['pro_name']);
		
				?>
		  </td>
		  <td><?php echo ($row['orderdate']); ?></td>
		  <td><?php echo ($row['pro_qty']); ?></td>
		  <td><?php echo ($row['pro_price']); ?> ریال</td>
		  <td>
		     <?php 
		        echo($row['pro_qty']*$row['pro_price']);//محاسبه قیمت نهایی
		      ?>
		  ریال</td>
	  </tr>
	  <tr bgcolor="<?php if ($row['state']=='3') echo('darksalmon'); else echo('violet'); //با توجه به فیلد state رنگ تغییر کند ?> ">
	       <td>شماره تماس</td>
	       <td>آدرس</td>
	       <td>کد مرسوله پستی</td>
	       <td>وضعیت سقارش</td>
	       <td colspan="3">ابزار مدیریتی</td>
	   </tr>
	   <tr>
		  <td><?php echo ($row['mobile']); ?></td>
		  <td><?php echo ($row['address']); ?></td>
		  <td><?php echo ($row['trackcode']); ?></td>
		  <td bgcolor="linen" >
			  <?php 
		           switch($row['state']){//یررسی حالت هلی مختلف داده های قیلد state
					   case 0://اگر مقدار فیلد 0 باشد
						   echo("تحت بررسی");
						   break;
					   case 1://اگر مقدار فیلد 1 باشد
						   echo("آماده برای ارسال");
						   break;
					   case 2://اگر مقدار فیلد 2 باشد
						   echo("ارسال شده");
						   break;
					   case 3://اگر مقدار فیلد 3 باشد
						   echo("سفارش لغو شده است");
						   break;
				   }
		      ?>
		   </td>
		   <td colspan="3" bgcolor="cornsilk">
			   <b><a href="action_admin_orders_manage.php?id=<?php echo($row['id']) ?>&action=Checking" style="text-decoration:none ">تحت بررسی</a></b>
			   <br/>
			   <b><a href="action_admin_orders_manage.php?id=<?php echo($row['id']) ?>&action=Readytosend" style="text-decoration:none ">آماده برای ارسال</a></b>
			   <br/>
			   <b><a href="action_admin_orders_manage.php?id=<?php echo($row['id']) ?>&action=Posted" style="text-decoration:none ">ارسال شده</a></b>
			    <br/>
			   <b><a href="action_admin_orders_manage.php?id=<?php echo($row['id']) ?>&action=Cancel" style="text-decoration:none ">سفارش لغو شده</a></b>
		   </td>
	   </tr>
	  <tr bgcolor="salmon" style="height: 10px;">
		  <td colspan="7"></td>
	  </tr>
	
	<?php
	}//while
	?>
	
	
  </table>
<br/><br/>

<?php
include ("includes/footer.php");
?>