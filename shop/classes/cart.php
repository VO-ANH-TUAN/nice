<?php 
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>


<?php
/**
  * 
  */
 class cart 
 	{
 		private $db;
 		private $fm;
 	public function __construct()
 	{
 		$this->db=new Database();
 		$this->fm= new Format();
 	}
   public function add_to_cart($quantity,$id){
       $quantity=$this->fm->validation($quantity); 
      $quantity=mysqli_real_escape_string($this->db->link,$quantity);
      $id=mysqli_real_escape_string($this->db->link,$id);
      $sId=session_id();
      $query="SELECT * FROM tbl_product WHERE productId='$id'";
        $result=$this->db->select($query)->fetch_assoc();
          $productName=$result['productName'];
          $image=$result['image'];
          $price=$result['price'];
          $query_insert="INSERT INTO tbl_cart(productId,productName,quantity,sId,price,image) VALUES('$id','$productName','$quantity','$sId','$price','$image')";
          $insert_row=$this->db->insert( $query_insert);          
        if($insert_row){
         header('Location:cart.php');
        }else{
           header('Location:404.php');
        }
   }
   public function get_product_cart(){
     $sId=session_id();
      $query="SELECT *FROM tbl_cart WHERE sId='$sId'";
        $result=$this->db->select($query);
        return $result;
   }
        public function update_quantity_cart($quantity,$cartId){
           $quantity=mysqli_real_escape_string($this->db->link,$quantity);
           $cartId=mysqli_real_escape_string($this->db->link,$cartId);
            $query="UPDATE tbl_cart SET 
           quantity='$quantity'             
           WHERE cartId='$cartId'";
           $result=$this->db->update($query);
             if($result){
               header('Location:cart.php');
             }else{
                   $smg="<span class='error'>Product quantity updated not successfully</span>";
              return $smg;
             }
        }
        public function delete_product_cart($cartid){
          $cartid=mysqli_real_escape_string($this->db->link,$cartid);
           $query="DELETE FROM tbl_cart WHERE cartId='$cartid'";
          $result=$this->db->delete($query);
            if( $result){
              header('Location:cart.php');
         // $alert ="<span class='success'>Product deleted successfully</span>";
         // return $alert;
        }else{
           $alert ="<span class='error'>Product deleted not successfully</span>";
          return $alert;
        }
        }
        public function check_cart()
        {
           $sId=session_id();
      $query="SELECT *FROM tbl_cart WHERE sId='$sId'";
        $result=$this->db->select($query);
        return $result;
        }
         public function check_order($customer_id)
        {
           // $sId=session_id();
        $query="SELECT *FROM tbl_order WHERE customer_id='$customer_id'";
        $result=$this->db->select($query);
        return $result;
        }
        public function dell_all_data_cart()
        {
        $sId=session_id();
        $query="DELETE FROM tbl_cart WHERE sId='$sId'";
        $result=$this->db->select($query);
        return $result;
        }
         public function insertOrder($customer_id)
        {
           $sId=session_id();
        $query="SELECT * FROM tbl_cart WHERE sId='$sId'";
        $get_product=$this->db->select($query);
        if($get_product){
          while($result=$get_product->fetch_assoc()){
            $productid=$result['productId'];
            $productName=$result['productName'];
             $quantity=$result['quantity'];
               $price=$result['price']*$quantity;
               $image=$result['image'];
               $customer_id=$customer_id;
                 $query_order="INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity',' $price','$image','$customer_id')";
          $insert_row=$this->db->insert( $query_order);          
       
          }
        }

        }
        public function getamountprice($customer_id){
           $query="SELECT price FROM tbl_order WHERE customer_id='$customer_id'";
             $get_price=$this->db->select($query);
             return $get_price;
        }
        public function get_cart_ordered($customer_id){
          $query="SELECT * FROM tbl_order WHERE customer_id='$customer_id'";
             $get_cart_ordered=$this->db->select($query);
             return $get_cart_ordered;
        }
        public function get_inbox_cart(){
           $query="SELECT * FROM tbl_order ORDER BY date_order";
             $get_inbox_cart=$this->db->select($query);
             return  $get_inbox_cart;
        }

   } 
?>