<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../classes/customer.php');
include_once($filepath.'/../helpers/format.php');
?>
<?php 
$cs=new customer();
if(!isset($_GET['customerid'])||$_GET['customerid']== NULL){ 
    echo"<script>window.location='inbox.php'</script>"; 
}else{
    $id=$_GET['customerid'];
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sua danh mục</h2>   
              
                <?php 
                $get_customer_name=$cs->show_customer($id);
                if($get_customer_name){
                    while($result=$get_customer_name->fetch_assoc()){
                ?>

               <div class="block copyblock"> 
                 <form action=""method="post">
                    <table class="form">					
                        <tr>
                            <td>Name </td>
                            <td>:</td>
                            <td>
                                <input type="text" value="<?php echo $result['name'];?>" name="catName"  class="medium" />
                            </td>  
                        </tr>
						
                    </table>
                    </form>
                    <?php 
                      }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>