<?php
include ("includes/header.php");
    $link = mysqli_connect("localhost","root","","shop_db");
    if (mysqli_connect_errno())
	    exit("خطایی با شرح زیر رخ داده است:".mysqli_connect_error());

        $pro_code = 0;
        if (isset($_GET["id"]))
	        $pro_code = $_GET["id"];
        $query ="SELECT * FROM products WHERE pro_code='$pro_code'";
        $result = mysqli_query($link,$query);
?>
<br/>
<table width="100%"  >
    <tr>
		<?php
		if($row=mysqli_fetch_array($result)){
		?>
		
      <td style="border:0px;vertical-align: top;width: 33%;">
		  <div class="container" style="width: 400px;margin-right: 50pt;margin-top: 30pt">
               <div class="table-price" style="width: 600px;height: 700px">
                   <div class="pic-item" style="width: 550px;height: 450px;margin-top: 2%;margin-bottom: 2%;text-align: center;" >
                         <div  id="Layer_1"  >
                              <img height="300px" src="image/products/<?php echo($row['pro_image']) ?> " style="height:450px;width: 450px" />
                        </div>
                    </div>
                    <div class="description" style="height: 280px;width: 600px;">
                        <h1 class="title" style="font-size: 24px;margin-top: 5%;"><?php echo($row['pro_name']) ?></h1>
                        <span class="price" style="margin-top: -8%;color:lightgrey;">قیمت:<?php echo($row['pro_price']) ?>ریال </span>
	                     <span class="price" style="margin-top: -3%;">تعداد موجودی :<?php echo($row['pro_qty']) ?></span>
	                     <span class="price" style="margin-top: 3%;color: blanchedalmond;">توضیحات : <?php echo($row['pro_detail']) ?></span>
	                     <a href="order.php?id=<?php echo($row['pro_code']) ?> "class="price" style="margin-top: 16%;color: wheat;font-size: 25px">سفارش و خرید پستی</a>
                     </div>
                 </div>
		  </div>
		<br/><br/>
		<br/><br/>
		  <br/><br/>
		</td>
	<?php
		}//if
	?>
	</tr>
</table>

<?php
include ("includes/footer.php");
?>