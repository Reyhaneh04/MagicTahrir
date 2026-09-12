<?php
include ("includes/header.php");
   if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true && $_SESSION["user_type"]=="admin")){
?>
<script type="text/javascript">
	<!--
	location.replace("index.php");
	-->
</script>
<?php
}//ifپایان

$link = mysqli_connect("localhost","root","","shop_db");

if (mysqli_connect_errno())
	exit("خطایی با شرح زیر رخ داده است:".mysqli_connect_error());

$url = $pro_code=$pro_name=$pro_qty=$pro_price=$pro_image=$pro_detail="";
$btn_caption="افزودن کالا";
if (isset($_GET['action']) && ($_GET['action']=='EDIT')){
	$id = $_GET['id'];
	$query = "SELECT * FROM products WHERE pro_code='$id'";
	$result = mysqli_query($link,$query);
	if ($row = mysqli_fetch_array($result)){
		$pro_code = $row['pro_code'];
		$pro_name = $row['pro_name'];
		$pro_qty = $row['pro_qty'];
		$pro_price = $row['pro_price'];
		$pro_image = $row['pro_image'];
		$pro_detail = $row['pro_detail'];
		$url = "?id=$pro_code&action=EDIT";
		$btn_caption = "ویرایش کالا";
		}
	}

?>
<script  type="text/javascript">
	function delet(){
		var x = confirm (" ایا از حذف کالای موردنظر اطمینان دارید؟");
		if (x == true)
			return true;//اگر کاربر تایید کرد تورو را برگرداند
		else{
			event.preventDefault();//جلوی انجام خاصیت پیشفرض دکمه را در صفحه میگیرد
		return false;
		}
	}
	
</script>
<br/>
<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				
                  <form  class="login100-form validate-form" name="add_product" action="action_admin_products.php<?php 
				  if (!empty($url))echo($url); ?>" method="post"       enctype="multipart/form-data">
					  
                       <div class="wrap-input100 validate-input" >
                           <span class="label-input100">کد کالا:</span><span style="color: red">*</span>
                           <input class="input100" placeholder="کد کالا..." type="text" id="pro_code" name="pro_code" value="<?php echo($pro_code) ?>" />
		                   <span class="focus-input100"></span>
                       </div>
		
                      <div class="wrap-input100 validate-input" >
                           <span class="label-input100">نام کالا:</span><span style="color: red">*</span>
                           <input class="input100" placeholder="نام کالا..." type="text" style="text-align: right;" id="pro_name" name="pro_name" value="<?php echo($pro_name) ?>" />
	                       <span class="focus-input100"></span>
                       </div>
		
                       <div class="wrap-input100 validate-input" >
                            <span class="label-input100">موجودی کالا:</span><span style="color: red">*</span>
                            <input class="input100" placeholder="موجودی کالا..." type="text" style="text-align:left;" id="pro_qty" name="pro_qty" value="<?php echo($pro_qty) ?>" /> 
		                    <span class="focus-input100"></span>
                      </div>
		
                      <div class="wrap-input100 validate-input" >
                           <span class="label-input100">قیمت کالا(ریال):</span><span style="color: red">*</span>
                           <input class="input100" placeholder="قیمت کالا..." type="text" style="text-align:left;" id="pro_price" name="pro_price" value="<?php echo($pro_price) ?>" />
		                   <span class="focus-input100"></span>
                     </div>
		
                     <div class="wrap-input100 validate-input" >
                          <span class="label-input100">آپلود تصویر کالا:</span><span style="color: red">*</span>
                          <input  type=file style="text-align:left;" id="pro_image" name="pro_image" />
	                 	  <?php if(!empty($pro_image))
	                 	  echo("<img src='image/products/$pro_image' width='100' height='100'/>")
	                 	  ?>
                     </div>
		
                     <div class="wrap-input100 validate-input" >
                          <span class="label-input100">توضیحات تکمیلی کالا<span style="color: red;">*</span></span>
                          <textarea class="input100" id="pro_detail" name="pro_detail" cols="45" rows="10" wrap="virtual"><?php echo($pro_detail) ?>                 </textarea>
	                 	 <span class="focus-input100"></span>
                     </div>
	                 	<div class="container-login100-form-btn">
	                 		<div class="wrap-login100-form-btn">
	                 			<div class="login100-form-bgbtn"></div>
	                 			<div class="login100-form-btn">
                                     <input type="submit" value="<?php echo($btn_caption) ?>" class="login100-form-bgbtn"               style="color:#ECE4E4;font-size: 20px;"/>
	                 			 </div>
	                 		</div>
	                 	</div>
	                 	
	                 	<div class="container-login100-form-btn">
						      <div class="wrap-login100-form-btn">
	                 				<div class="login100-form-bgbtn"></div>
		                 		    <div class="login100-form-btn">
		                                 <input type="reset" value="جدید" class="login100-form-bgbtn" style="color:#ECE4E4;font-size: 20px;" />
								</div>
						    </div>
					   </div>
                   </form>
			</div>
		</div>
	</div>
	
<?php
$query = "SELECT * FROM products";
$result = mysqli_query($link,$query);
?>

<table border="1px" bordercolor="#9B4588" style="text-align: center" width="100%"  style="width: 100%">
	<tr>
		<td>کد کالا</td>
		<td>نام کالا</td>
		<td>موجودی کالا</td>
		<td>قیمت کالا</td>
		<td>تصویر کالا</td>
		<td>ابزار مدیریتی</td>
	</tr>
	
	<?php
	while ($row = mysqli_fetch_array($result)){
	?>
	<tr>
		<td><?php echo($row['pro_code']) ?></td>
		<td><?php echo($row['pro_name']) ?></td>
		<td><?php echo($row['pro_qty']) ?></td>
		<td><?php echo($row['pro_price']) ?>&nbsp;ریال</td>
		<td><img src="image/products/<?php echo($row['pro_image']) ?>" width="150px" height="150px" /> </td>
		<td>
			<b><a href="action_admin_products.php?id=<?php echo($row['pro_code']) ?>&action=DELETE" style="text-decoration: none;" onClick="delet();">حذف</a></b>
			&nbsp;&nbsp;
			<b><a href="admin_products.php?id=<?php echo($row['pro_code']) ?>&action=EDIT" style="text-decoration: none;">ویرایش</a></b>
		</td>
	</tr>
	
	<?php
	}//while
		?>
	
</table>
	<br/><br/><br/>
<?php
include ("includes/footer.php");
?>