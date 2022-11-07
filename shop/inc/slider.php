
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
                 $getLastestLaForce=$pd->getLastestLaForce();
                 if($getLastestLaForce){
                   while($resultLaForce=$getLastestLaForce->fetch_assoc()){               
				?> 
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/uploads/<?php echo $resultLaForce['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>LaForce (Brown)</h2>
						<p><?php echo $resultLaForce['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultLaForce['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			       <?php
                   }
                 }
			    ?>		
			    <?php 
                 $getLastestTom_Ford=$pd->getLastestTom_Ford();
                 if($getLastestTom_Ford){
                   While($resultTom_Ford=$getLastestTom_Ford->fetch_assoc()){
               
				?> 
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/uploads/<?php echo $resultTom_Ford['image'] ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Tom Ford (Black)</h2>
						  <p><?php echo $resultTom_Ford['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultTom_Ford['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
				  <?php
                   }
                 }
			    ?>	
			</div>
			<div class="section group">

				<?php 
                 $getLastestValentino_Creations=$pd->getLastestValentino_Creations();
                 if( $getLastestValentino_Creations){
                   while($resultValentino_Creations= $getLastestValentino_Creations->fetch_assoc()){               
				?> 
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/uploads/<?php echo $resultValentino_Creations['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Valentino Creations</h2>
						<p><?php echo $resultValentino_Creations['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultValentino_Creations['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			     <?php
                   }
                 }
			    ?>		
			    	<?php 
                 $getLastestSan_Kelloff=$pd->getLastestSan_Kelloff();
                 if( $getLastestSan_Kelloff){
                   while($resultSan_Kelloff= $getLastestSan_Kelloff->fetch_assoc()){               
				?> 	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/uploads/<?php echo $resultSan_Kelloff['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>San Kelloff (Brown) </h2>
						  <p><?php echo $resultSan_Kelloff['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultSan_Kelloff['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
				   <?php
                   }
                 }
			    ?>		
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/laforce.jpg" alt=""/></li>
						<li><img src="images/tom_ford.jpg" alt=""/></li>
						<li><img src="images/valentino_creation01.jpg" alt=""/></li>
						<li><img src="images/San_Kelloff.jpeg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	
