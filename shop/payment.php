
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
<?php
// if(!isset($_GET['proid'])||$_GET['proid']==NULL){
//     echo"<script>window.location='404.php'</script>"; 
// }else{
//     $id=$_GET['proid'];
// }
// $ct= new cart();
// if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['submit'])){
//      $quantity=$_POST['quantity'];
//     $AddtoCart=$ct->add_to_cart($quantity,$id);
// }
 ?>
 <style>
   .wrapper_method{
      margin-left:  200px;
      width: 700px;
     border: 2px solid blue; 
     padding-top: 30px;

   }
    .wrapper_method p {
      width: 200px;
    margin-left: 250px;
    margin-top: 15px;
    padding: 10px;
    text-align: center;
    border: 1px solid blueviolet;
   /* margin: 10px;*/
    background: azure;

}
h3.payment {
   margin-bottom: 20px;
    text-align: center;
    font-size: 23px;
    font-weight: bold;
}
 </style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>PAYMENT METHOD</h3>
    		</div>
         <div class="clear"></div>
         <div class="wrapper_method">
         <h3 class="payment">Choose your method payment</h3>             		
          <p><a class="payment_hef" href="offlinepayment.php">Offline Payment</a></p>
          <p><a class="payment_hef" href="onlinepayment.php">Online Payment</a></p>
           <p><a  href="cart.php"> << Prerious</a></p>
       </div>
    	</div>   	  	
 	</div>
 </div>
	<?php
include 'inc/footer.php';
?>

