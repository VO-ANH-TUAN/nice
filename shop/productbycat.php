<?php
include 'inc/header.php';
//include 'inc/sidebar.php';
?>
<?php 
$cat=new category();
if(!isset($_GET['catid'])||$_GET['catid']==NULL){
    echo"<script>window.location='404.php'</script>"; 
}else{
    $id=$_GET['catid'];
}
// $cat=new category();
// if($_SERVER['REQUEST_METHOD']=='POST'){
//     $catName=$_POST['catName'];   
//     $updateCat=$cat->update_category($catName,$id);
// }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<?php 
            $getnameproductbycat=$cat->get_name_product_by_cat($id);
            if( $getnameproductbycat){
            	while($result_name_product_by_cat= $getnameproductbycat->fetch_assoc()){


	      	?>
    		<h3>CATEGORY:<?php  echo  $result_name_product_by_cat['catName'] ?></h3>
    			<?php 

            	}
            }else{
            	echo 'Category Not Avaiable!!!';
            }

				?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
            $getproductbycat=$cat->get_product_by_cat($id);
            if($getproductbycat){
            	while($result_product_by_cat=$getproductbycat->fetch_assoc()){


	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result_product_by_cat['image'] ?>"width=200px alt="" /></a>
					 <h2><?php echo $result_product_by_cat['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_product_by_cat['product_desc'],50 )?></p>
					 <p><span class="price"><?php echo $result_product_by_cat['price'].' '.'VND' ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_product_by_cat['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 

            	}
            }

				?>
				
			</div>

	
	
    </div>
 </div>
<?php
include 'inc/footer.php';

?>