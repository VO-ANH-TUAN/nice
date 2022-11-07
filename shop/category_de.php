<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
<!-- <?php
if(!isset($_GET['proid'])||$_GET['proid']==NULL){
    echo"<script>window.location='404.php'</script>"; 
}else{
    $id=$_GET['proid'];
}
$ct= new cart();
if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['submit'])){
     $quantity=$_POST['quantity'];
    $AddtoCart=$ct->add_to_cart($quantity,$id);
}
?> -->

 <div class="main">
    <div class="content">
        <div class="section group">
    	<div class="rightsidebar span_3_of_1">
                    <h2>CATEGORIES</h2>
                    <?php 
                    $get_allcategory=$cat->get_all_category();
                    if($get_allcategory){
                        while($result_all_category= $get_allcategory->fetch_assoc()){              
                    ?>
                    <ul>
                      <li><a href="productbycat.php?catid=<?php echo $result_all_category['catId'] ?>"><?php echo $result_all_category['catName']?></a></li>               
                    </ul>
                   <?php 
                      }
                    }
                   ?>
            </div>
        </div>
    </div>
 </div>
<?php
include 'inc/footer.php';

?>
