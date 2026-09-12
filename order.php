<?php
include ("includes/header.php");

$link = mysqli_connect("localhost","root","","shop_db");

if (mysqli_connect_errno())
	exit("خطایی با شرح زیز است:".mysqli_connect_error());

$pro_code = 0;
if (isset($_GET['id'])){
	$pro_code=$_GET['id'];
	}

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true)){
?>
<br/>
<span style='color:red;'><b>برای خرید پستی محصول انتخاب شده باید وارد سایت شوید </b></span>
<br/><br/>
در صورتی که عضو سایت هستید برای ورود
<a href="login.php" style="text-decoration: none;"><span style="color: blue;"><b>اینجا</b></span></a>
کلیک کنید
<br/>
و اگر عضو سایت نیستید برای ثبت نام در سایت
<a href="register.php" style="text-decoration: none;"><span style="color: green;"><b>اینجا</b></span></a>
کلیک کنید
<br/><br/>
<?php
	exit();
}

$query ="SELECT * FROM products WHERE pro_code='$pro_code'";
	
$result = mysqli_query($link,$query);
	
?>
<br/>
<div class="limiter" >
		<div class="container-login100" >

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50" style="width: 80%;">
				
                  <form name="order" action="action_order.php" method="post" class="login100-form validate-form" >
	                    <table width="100%;" border="0px">
		                  <tr><td style="width: 50%">
			                      <?php
	                                 if ($row = mysqli_fetch_array($result)){
	                              ?>
			<br/>
	             <table width="100%" border="0" style="margin-left: auto;margin-right: auto;">
		
                       <div class="wrap-input100 validate-input" >
                            <span class="label-input100">کد کالا</span><span style="color: red">*</span>
                            <input class="input100" type="text" id="pro_code" name="pro_code" value="<?php echo($pro_code); ?>" style="background-color:#94479D;color: aliceblue;" readonly />
		                    <span class="focus-input100"></span>
                      </div>
		
                      <div class="wrap-input100 validate-input" >
                            <span class="label-input100">نام کالا</span><span style="color: red">*</span>
                           <input class="input100"  type="text" id="pro_name" name="pro_name" value="<?php echo($row['pro_name']); ?>" style="background-color:#94479D;color: aliceblue;text-align: right;" readonly />
		                   <span class="focus-input100"></span>
                      </div>
		
                      <div class="wrap-input100 validate-input" >
                            <span class="label-input100">تعداد یا مقدار درخواستی</span><span style="color: red">*</span>
                            <input class="input100"  type="text" id="pro_qty" name="pro_qty" style="text-align: left;" onChange="calc_price();" />
		                   <span class="focus-input100"></span>
                      </div>
		
                      <div class="wrap-input100 validate-input" >
                            <span class="label-input100">قیمت واحد کالا(ریال) </span><span style="color: red">*</span>
                            <input class="input100"   type="text" id="pro_price" name="pro_price" value="<?php echo($row['pro_price']); ?> " style="background-color:#94479D;color: aliceblue;text-align: left;" readonly />
		                    <span class="focus-input100"></span>
                     </div>
		
                     <div class="wrap-input100 validate-input" >
                           <span class="label-input100">مبلغ قابل پرداخت(ریال) </span><span style="color: red">*</span>
                           <input class="input100" type="text" id="total_price" name="total_price" value="0" style="background-color:#94479D;color:                  aliceblue;text-align: left;" readonly />
		                   <span class="focus-input100"></span>
                     </div>
		
		             <script type="text/javascript">
			             <!--
			             function calc_price()
			             {
				             var pro_qty=<?php echo($row['pro_qty']); ?>;
				             var price=document.getElementById('pro_price').value;
				             var count=document.getElementById('pro_qty').value;
				             var total_price;
				
				             if(count>pro_qty){
					             alert('تعداد موجودی انبار کمتر از درخواست شما است!!');
					             document.getElementById('pro_qty').value=0;
					             count=0;
				             }
				
				             if (count == 0 || count == "")
					             total_price=0;
				             else
					             total_price=count*price;
				
				             document.getElementById('total_price').value=total_price;
			             }
			             -->
		             </script>
		
		<?php
		     $query ="SELECT * FROM users WHERE username='{$_SESSION['username']}' ";
		     $result = mysqli_query($link,$query);
		     $user_row = mysqli_fetch_array($result);
		?>
		
			<br/><br/><br/>
		<br/><br/><br/>
		
		<div class="wrap-input100 validate-input" >
			<span class="label-input100">نام خریدار</span><span style="color: red">*</span>
			<input class="input100" type="text" id="realname" name="realname" value="<?php echo($user_row['realname']);?>" style="background-color: #94479D;color: aliceblue;" readonly />
			<span class="focus-input100"></span>
		</div>
		
		<div class="wrap-input100 validate-input" >
			<span class="label-input100">پست الکترونیکی</span><span style="color: red">*</span>
			<input class="input100" type="text" id="email" name="email" value="<?php echo($user_row['email']);?>" style="background-color: #94479D;color: aliceblue;text-align: left;" readonly />
			<span class="focus-input100"></span>
		</div>
		
		<div class="wrap-input100 validate-input" >
			<span class="label-input100">شماره تلفن همراه</span><span style="color: red">*</span>
			<input class="input100"  type="text" id="mobile" name="mobile" value="09" style="text-align: left;"  />
			<span class="focus-input100"></span>
		</div>
		
		<div class="wrap-input100 validate-input" >
			<span class="label-input100">ادرس دقیق پستی جهت دریافت محصول</span><span style="color: red">*</span>
			<textarea class="input100" id="address" name="address" cols="30" rows="3" wrap="virtual" style="text-align:right;font-family: tahoma;" ></textarea>
			<span class="focus-input100"></span>
		</div>
		
		<div class="container-login100-form-btn">
			 <div class="wrap-login100-form-btn">
				 <div class="login100-form-bgbtn"></div>
				      <div class="login100-form-btn">
			                <input type="button" value="خرید محصول" onClick="check_input();"  class="login100-form-bgbtn" style="color:#ECE4E4;font-size: 20px;" />
		          </div>
			 </div>
		</div>
		
     </table>
			</td>
	
			<td>
				
				<script type="text/javascript">
					<!--
					function check_input()
					{
						var r = confirm("از صحت اطلاعات وارد شده اطمینان درارید؟");
						if (r == true){
							var validation=true;
							var count=document.getElementById('pro_qty').value;
							var mobile=document.getElementById('mobile').value;
							var address=document.getElementById('address').value;
							
							if (count ==0 || count == "")
								validation=false;
							
							if(mobile.length<11)
								validation=false;
							
							if (address.length<15)
								validation=false;
							
							if (validation)
								document.order.submit();
							else
								alert('برخی از ورودی های فرم سفارش محصول به درستی پر نشده اند');
						}
					}
					-->
				</script>
				
				 <div class="container"  style="padding-right: 15%;">
                                <div class="table-price" style="width: 500px;height: 600px">
                                     <div class="pic-item" style="width: 350px;height:450px;margin-top:2%;margin-right:8% " >
										<div    id="Layer_1"   >
							                  <img src="image/products/<?php echo($row['pro_image']) ?>" style="height:400px;width: 400px;padding-right: 10%;padding-top: 5%;" />
										</div>
									</div>
									<div class="description" style="height: 270px;width: 500px">
										<h1 class="title" style="margin-top: 5%;font-size: 25px;"><?php echo($row['pro_name']) ?></h1>
						                <span class="price" style="margin-top: -10%;color:lightgrey;">قیمت واحد :<?php echo($row['pro_price']) ?>ریال </span>
										<span class="price" style="margin-top: -0%;color: blanchedalmond;">مقدار موجودی :<?php echo($row['pro_qty']) ?></span>
							            <span class="price" style="margin-top: 10%;">توضیحات :
							                 <?php
			                                       $count = strlen('pro_detail');
		                                           echo(substr($row['pro_detail'],0,(int)($count/2)));
							                 ?>
							           ...</span>
							<bt/><br/>
						</div>
                     </div>
                 </div>
			</tr>	
      </table>
   </form>
			</div>
		</div>
	</div>	
<?php
	}//if
include ("includes/footer.php");
?>