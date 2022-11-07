<?php
include 'inc/header.php';
include 'inc/slider.php';
?>


 <div class="main">
     <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	$get_product_featured=$pd->getproduct_featured();
	      	if($get_product_featured){
	      		while($result=$get_product_featured->fetch_assoc()){
	      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten( $result['product_desc'],30 )?></p>
					 <p><span class="price"><?php echo $result['price']."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
			<?php 
            	}
	      	}
			?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
					<?php
	      	$get_product_new=$pd->getproduct_new();
	      	if($get_product_new){
	      		while($result_new=$get_product_new->fetch_assoc()){	      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten( $result_new['product_desc'],30 )?></p>
					 <p><span class="price"><?php echo $result_new['price']."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Details</a></span></div>
				</div>
					<?php 
            	}
	      	}
			?>
				
			</div>
			<div>
				<?php
             $get_product_all=$pd->getproduct_all();
             $product_count= mysqli_num_rows($get_product_all);
             $product_button=ceil($product_count)/4;
             $i=1;
             echo '<p>Trang:</p>';
             for($i=1;$i<=$product_button;$i++){
             	echo '<a style="margin:0 5px;" href="index.php?trang='.$i.'">'.$i.'</a>';
             }
				?>
			</div>
    </div>
 </div>

 <?php
include 'inc/footer.php';

?>
