
<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
<?php
$login_check=Session::get('customer_login');
            if($login_check==false){
            	header('Location:login.php');
            }
 ?>

 <form action="" method="POST">
 <style type="text/css">
 	.box-left{
 		width: 100%;
 		
 		border: 1px solid black;
         padding: 4px;
 	}

 	
 	
 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="heading">
    		<h3>Your detail ordered</h3>
    		</div>
         <div class="clear"></div>
         <div class="box-left">
         	<div class="cartpage">
			    	<!-- <h3>Your Cart</h3> -->
              
						<table class="tblone">
							<tr>
								<th width="10%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="10%">Quantity</th>
								<th width="15%">Date time</th>								
								<th width="10%">Status</th>							
								<th width="10%">Action</th>
							</tr>
							<?php 
							$customer_id=Session::get('customer_id');
                     $get_cart_ordered=$ct->get_cart_ordered($customer_id);
                     if($get_cart_ordered){
                     	$i=0;
                     	$qty=0;
                     	while($result=$get_cart_ordered->fetch_assoc()){
                           $i++;
							?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price']?></td>
								<td><?php echo $result['quantity']?></td>	                      
								<td><?php echo $fm->formatDate($result['date_order'])?></td>
								<td>
									<?php
									if($result['Status']==0){
										echo 'Pending';
									}else{
										echo 'Processed';
									}
									?>
								</td>							
								<td><a onclick='return confirm("Are you want to delete?");' href='?cartid=<?php echo $result['cartId'] ?>' >Xóa</a></td>
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
 	</form>
	<?php
include 'inc/footer.php';

?>

