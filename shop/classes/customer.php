<?php 
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>


<?php
/**
  * 
  */
 class customer
 	{
 		private $db;
 		private $fm;
 	public function __construct()
 	{
 		$this->db=new Database();
 		$this->fm= new Format();
 	}
   public function insert_customer($data)
  {
     $name=mysqli_real_escape_string($this->db->link,$data['name']);
     $city=mysqli_real_escape_string($this->db->link,$data['city']);
     $zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
     $email=mysqli_real_escape_string($this->db->link,$data['email']);
     $address=mysqli_real_escape_string($this->db->link,$data['address']);
     $country=mysqli_real_escape_string($this->db->link,$data['country']);
     $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
     $password=mysqli_real_escape_string($this->db->link,md5($data['password']));
       if($name==""||$city==""|| $zipcode==""||$email==""||$address==""||$country==""||$phone==""||$password==""){
          $alert="<span class='error'>Fields must be not empty </span>";
          return $alert;
          }else{
            $check_email="SELECT * FROM tbl_customer WHERE email='$email'LIMIT 1";
            $result_check=$this->db->select($check_email);
            if($result_check){
              $alert="<span class='error'>Email Already Existed</span>";
          return $alert;
            }else{
              $query="INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$country','$phone','$password')";

          $insert_row=$this->db->insert($query);
           
           if($insert_row){
          $alert ="<span class='success'>Customer created successfully</span>";
          return $alert;
            }else{
           $alert ="<span class='error'>Customer created not successfully</span>";
          return $alert;
           }
            }
          }
    }
    public function login_customer($data){
      $email=mysqli_real_escape_string($this->db->link,$data['email']);
      $password=mysqli_real_escape_string($this->db->link,md5($data['password']));
         if($email==''||$password==''){
          $alert="<span class='error'>Email and Password must be not empty </span>";
          return $alert;
          }else{
            $check_login="SELECT * FROM tbl_customer WHERE email='$email'AND password='$password'";
            $result_check=$this->db->select($check_login);
            if($result_check){
              $value=$result_check->fetch_assoc();
              Session::set('customer_login',true);
              Session::set('customer_id',$value['id']);
              Session::set('customer_name',$value['name']);
              header('Location:order.php');
           }else{
           $alert ="<span class='error'>Email or password doesn't match</span>";
          return $alert;
           }
            }
          }
    public function show_customer($id){
       $query="SELECT * FROM tbl_customer WHERE id='$id'";
            $result=$this->db->select($query);
            return $result;
    }
    public function update_customer($data,$id){
     $name=mysqli_real_escape_string($this->db->link,$data['name']);
     $zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
     $email=mysqli_real_escape_string($this->db->link,$data['email']);
     $address=mysqli_real_escape_string($this->db->link,$data['address']);
     $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
 
       if($name==""|| $zipcode==""||$email==""||$address==""||$phone==""){
          $alert="<span class='error'>Fields must be not empty </span>";
          return $alert;
          }else{           
          $query="UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id='$id'";
          $update_row=$this->db->update($query);           
           if($update_row){
          $alert ="<span class='success'>Customer Updated successfully</span>";
          return $alert;
          }else{
           $alert ="<span class='error'>Customer Updated  not successfully</span>";
          return $alert;
           }
            }
          }
      public function insert_comment(){
        $product_id=$_POST['product_id_comment'];
        $commenter=$_POST['commenter'];
        $comment=$_POST['comment'];

       if($commenter==""|| $comment==""){
         $alert ="<span class='error'>Fields must be not empty </span>";
          return $alert;
       }else{
        $query="INSERT INTO tbl_comment(commenter,comment_detail,product_id) VALUES(' $commenter','  $comment',' $product_id')";
           $insert_row=$this->db->insert($query);        
           if($insert_row){
          $alert ="<span class='success'>Comment has been submitted for moderation</span>";
          return $alert;
            }else{
           $alert ="<span class='error'>Comments have not been submitted for moderation</span>";
          return $alert;
           }
       }
      }
    }        
?>