
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
  <style type="text/css">
   .success_order{
      text-align: center;
     color: red;
     font-size: 20px;
     font-weight: bold;
   }
   .success_note{
    text-align: center;
    color: green;
   }
   .here_11{
      text-align: center;
      color: green;
   }
 </style>

 <form action="" method="POST">
 <div class="main1">
    <div class="content1">
    	<div class="section group1">
    	<h2 class="success_order"> Success Order<h2> 
      <?php
      $customer_id=Session::get('customer_id');
      $get_amount=$ct->getamountprice($customer_id);
      if($get_amount){
         $amount=0;
      while($result=$get_amount->fetch_assoc()){
          $price=$result['price'];
          $amount=$price;
            }
        }
      ?>      
         <h3 class="success_note">Total price you have bought from my wesite: 
            <?php 
            $vat=$amount*0.03; 
            $total=$vat+$amount; 
            echo $total.'VND' 
            ?>
               
            </h3>              
         <h3 class="here_11">We will contact as soon as possiable. Please see your order detail here 
            <a href="orderdetail.php"> Click Here</a></h3>        
 		</div>
 	</div>
 </div>
 </form>
<?php
include 'inc/footer.php';
?>

