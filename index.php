<?php
include ("includes/header.php");

//اتصال به پایگاه داده shp_db
$link = mysqli_connect("localhost","root","","shop_db");

if (mysqli_connect_errno())
	exit("خطایی با شرح زیر رخ داده است:".mysqli_connect_error());

$query = "SELECT * FROM products";

$result = mysqli_query($link,$query);

?>
<br/>
<table width="80%" style="margin-top:50pt;margin-right:50pt border=0px" >
    <tr>
		<?php
		$counter=0;
		while($row=mysqli_fetch_array($result)){
			$counter++;
		?>
		
      <td style="width: 33%; margin-right: 40pt;border:0; ">
		  <div class="container" >
                <div class="table-price" style="width: 300px;height: 350px">
                      <div class="pic-item" style="width: 375px;height:260px;margin-top:2%;margin-right:8% " >
                           <div   height="150px" id="Layer_1"   width="150px" >
								   <a href="product_detail.php?id=<?php echo($row['pro_code']) ?>" style="text-decoration: none;">
                                      <img src="image/products/<?php echo($row['pro_image']) ?>" style="height:250px;width: 250px" />
								   </a>
                           </div>
                       </div>
                       <div class="description" style="height: 270px;width: 300px">
                              <h1 class="title"><?php echo($row['pro_name']) ?></h1>
                              <span class="price" style="margin-top: -20%;">قیمت:<?php echo($row['pro_price']) ?>ریال </span>
                              <span class="price" style="margin-top: -10%;">تعداد موجودی :<?php echo($row['pro_qty']) ?></span>
                              <span class="price" style="margin-top: -0%;">توضیحات : <?php echo(substr($row['pro_detail'],0,120)) ?>...</span>
	                              <a href="product_detail.php?id=<?php echo($row['pro_code']) ?>" class="price" style="margin-top: 30%;" >توضیحات تکمیلی و خرید</a>
                        </div>
                </div>
		  </div>
		  <br/><br/>
<br/><br/>
		  <br/><br/>
<br/><br/>
		  <br/><br/>
<br/>

		   <br/>
		</td>
	
	<?php
	if($counter%3==0)
		echo("</tr><tr>");
			}//while
			if($counter%3!=0)
			echo("</tr>");
		
	?>
</table>
<?php
include ("includes/footer.php");
?>