<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
<?php 
$ct= new cart();
  if(isset($_GET['cartid'])){  
       $cartid=$_GET['cartid']; 
      $delCart=$ct->delete_product_cart($cartid);
}
if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['submit'])){
	 $cartId=$_POST['cartId'];
     $quantity=$_POST['quantity'];
    $UpdateQuantityCart=$ct->update_quantity_cart($quantity,$cartId);
}
?>
<!-- <?php 
if(!isset($_GET['id'])){
    echo"<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?> -->

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				<?php
                 if(isset($_GET['congthanhtoan'])=='vnpay'){ 
				 ?>
			    	<h2 style="width: 100%;">Payment by VNPAY</h2>
			    <?php 
			     }
			    ?>
               <?php 
               if(isset($UpdateQuantityCart)){
               	echo $UpdateQuantityCart;
               }
               ?>
                <?php 
               if(isset($delCart)){
               	echo $delCart;
               }
               ?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
                     $get_product_cart=$ct->get_product_cart();
                     if($get_product_cart){
                     	$subtotal=0;
                     	$qty=0;
                     	while($result=$get_product_cart->fetch_assoc()){
                           
							?>
							<tr>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price']?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId"min="0" value="<?php echo $result['cartId']?>"/>
										<input type="number" name="quantity"min="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
									<?php
									$total= $result['price']*$result['quantity'];
									echo $total;
									?>
								</td>
								<td><a href="?cartid=<?php echo $result['cartId'] ?>">Xo??a</a></td>
							</tr>
								<?php  
								       $subtotal+=$total;  
								       $qty+=$result['quantity'] ;                    
                     	  }
                        }
								?>																																							
						</table>
							<?php
								   $check_cart=$ct->check_cart();
								   if($check_cart){
									                                                 
								 ?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php       
								          
                          echo $subtotal;
                          Session::set('sum',$subtotal);
                          Session::set('qty',$qty);
							    ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>3%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
                          $vat=$subtotal*0.03;
                          $grand_total=$subtotal+ $vat;
                          echo $grand_total;
							   ?></td>
							</tr>
					   </table>
					   <?php 
                      }else{
               	   echo 'Your Cart is Empty.Please shopping now!';
                     }
					   ?>
					</div>
					<?php
					$check_cart=$ct-> check_cart();
					if(Session::get('customer_id')==true && $check_cart){

					
					?>
					<?php
                 if(isset($_GET['congthanhtoan'])=='vnpay'){ 
				 ?>
			    	<form action="congthanhtoan.php" method="POST">
			    		<input type="hidden" name="total_congthanhtoan" value="<?php echo $grand_total ?>">
    			<button class="btn_thanhtoan" name="redirect" id="redirect" style="height:40px;width: 100px;color: white;background: green;text-align: center; margin-left: 50%;" >Thanh toa??n VNPAY</button>
    		</form> 
			    <?php 
			     }
			    ?>

			    <?php 
			}else{


			    ?>
			    <a href="cart.php">Quay v???? gio?? ha??ng</a>
			<?php 
		}
			?>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
include 'inc/footer.php';
?>

