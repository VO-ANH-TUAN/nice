
<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
<?php
if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
 $customer_id=Session::get('customer_id');
 $insertOrder=$ct->insertOrder($customer_id);
   	$delCart=$ct->dell_all_data_cart();
   	header('Location:success.php');
}
 ?>
 <form action="" method="POST">
 <style type="text/css">
 	.box-left{
 		width: 50%;
 		float: left;
 		border: 1px solid black;
         padding: 4px;
 	}

 	.box-right{
 		width: 47%;
 		float: right;
 		border: 1px solid black;
 		 padding: 4px;
 	}
 	a.submit_order {
    padding: 10px 70px;
    background: red;
    color: white;
    border: none;
    cursor: pointer;
    margin-bottom: 10px;
}
 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="heading">
    		<h3>OFFLINE PAYMENT</h3>
    		</div>
         <div class="clear"></div>
         <div class="box-left">
         	<div class="cartpage">
			    	<!-- <h3>Your Cart</h3> -->
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
								<th width="5%">ID</th>
								<th width="15%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<!-- <th width="10%">Action</th> -->
							</tr>
							<?php 
                     $get_product_cart=$ct->get_product_cart();
                     if($get_product_cart){
                     	$subtotal=0;
                     	$qty=0;
                     	$i=0;
                     	while($result=$get_product_cart->fetch_assoc()){
                           $i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'].' '.'VND'?></td>
								<td>
									<?php echo $result['quantity']?>
									<!-- <form action="" method="post">
										<input type="hidden" name="cartId"min="0" value="<?php echo $result['cartId']?>"/>
										<input type="number" name="quantity"min="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/> 
									</form> -->
								</td>
								<td>
									<?php
									$total= $result['price']*$result['quantity'];
									echo $total.' '.'VND';
									?>
								</td>
								<!-- <td><a href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td> -->
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
         </div>
         <div class="box-right">
         	<div class="section group">
    	  	<table class="tblone">
    	  		<?php 
    	  		$id=Session::get('customer_id');
                 $get_customer=$cs->show_customer($id);
                 if($get_customer){
                    while($result= $get_customer->fetch_assoc()){                 	
                             
    	  		?>
    	  		<tr>
    	  			<td>Name</td>
    	  			<td>:</td>
    	  			<td><?php echo $result['name']?></td>
    	  		</tr>
    	  		<tr>
    	  			<td>City</td>
    	  			<td>:</td>
    	  			<td><?php echo $result['city']?></td>
    	  		</tr>
    	  		<tr>
    	  			<td>Phone</td>
    	  			<td>:</td>
    	  			<td><?php echo $result['phone']?></td>
    	  		</tr>
    	  	<!-- 	<tr>
    	  			<td>Country</td>
    	  			<td>:</td>
    	  			<td><?php echo $result['country']?></td>
    	  		</tr> -->
    	  		<tr>
    	  			<td>Zipcode</td>
    	  			<td>:</td>
    	  			<td><?php echo $result['zipcode']?></td>
    	  		</tr>
    	  		<tr>
    	  			<td>Email</td>
    	  			<td>:</td>
    	  			<td><?php echo $result['email']?></td>
    	  		</tr>
    	  		<tr>
    	  			<td>Address</td>
    	  			<td>:</td>
    	  			<td><?php echo $result['address']?></td>
    	  		</tr>    
    	  		<tr>
    	  			
    	  			<td colspan="3"><a href="editprofile.php">Update Frofile</a></td>
    	  		</tr>  	  		
    	  		     <?php 
                   }
                  }
    	  		?>
     	  	</table>
 		  </div>
         </div>
 			</div>
 		</div>
 	</div>

 		<center><a href="?orderid=order" class="submit_order">Order Now</a></center>
 	</div>
 	</form>
	<?php
include 'inc/footer.php';

?>

