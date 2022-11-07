<?php 
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>


<?php
/**
  * 
  */
 class product 
 	{
 		private $db;
 		private $fm;
 	public function __construct()
 	{
 		$this->db=new Database();
 		$this->fm= new Format();
 	}
  public function search_product($tukhoa){
    $tukhoa=$this->fm->validation($tukhoa);
    $query="SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'";
          $result=$this->db->select($query);
          return $result;
  }
 	public function insert_product($data,$files){
     
      $productName=mysqli_real_escape_string($this->db->link,$data['productName']);
      $brand=mysqli_real_escape_string($this->db->link,$data['brand']);
      $category=mysqli_real_escape_string($this->db->link,$data['category']);
      $product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);
      $price=mysqli_real_escape_string($this->db->link,$data['price']);
      $type=mysqli_real_escape_string($this->db->link,$data['type']);
      //Kiem tra hinh anh va lay hinh anh cho vao folder upload
      $permited=array('jpg','jpeg','png','gif');
      $file_name=$_FILES['image']['name'];
      $file_size=$_FILES['image']['size'];
      $file_temp=$_FILES['image']['tmp_name'];
      $div=explode('.', $file_name);
      $file_ext=strtolower(end($div));
      $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
      $uploaded_image="uploads/".$unique_image;
        if($productName==""||$brand==""||  $category==""||$product_desc==""||$price==""||$type==""||$file_name==""){
        	$alert="<span class='error'>Fields must be not empty </span>";
        	return $alert;
        }else{
          move_uploaded_file($file_temp, $uploaded_image);
          /*unlink($unique_image);*/
        	$query="INSERT INTO tbl_product(productName,catId,brandId,product_desc,type,price,image) VALUES('$productName','$category','$brand','$product_desc','$type','$price','$unique_image')";

        	$insert_row=$this->db->insert($query);
           
        if($insert_row){
          $alert ="<span class='success'>Insert Product success</span>";
        	return $alert;
        }else{
           $alert ="<span class='error'>Insert Product not success </span>";
          return $alert;
        }
        }
 	}
  public function show_product(){
         // $query="SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName FROM //tbl_product INNER JOIN tbl_category ON tbl_product.catId=tbl_category.catId 
         // INNER JOIN tbl_brand ON tbl_product.brandId=tbl_brand.brandId
         // ORDER BY tbl_product.productId desc";
       // Hoặc có thể query
         $query="SELECT p.*,c.catName,b.brandName 
         FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE  p.catId=c.catId 
         AND p.brandId=b.brandId
         ORDER BY p.productId desc";


      //$query="SELECT * FROM tbl_product ORDER BY productId desc";
          $result=$this->db->select($query);
          return $result;
  }
  public function getproductbyId($id)
  {
    $query="SELECT * FROM tbl_product where productId='$id'";
          $result=$this->db->select($query);
          return $result;
  }
  public function update_product($data,$files,$id)
  {
    $productName=mysqli_real_escape_string($this->db->link,$data['productName']);
      $brand=mysqli_real_escape_string($this->db->link,$data['brand']);
      $category=mysqli_real_escape_string($this->db->link,$data['category']);
      $product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);
      $price=mysqli_real_escape_string($this->db->link,$data['price']);
      $type=mysqli_real_escape_string($this->db->link,$data['type']);
      //Kiem tra hinh anh va lay hinh anh cho vao folder upload
      $permited=array('jpg','jpeg','png','gif');
      $file_name=$_FILES['image']['name'];
      $file_size=$_FILES['image']['size'];
      $file_temp=$_FILES['image']['tmp_name'];
      $div=explode('.', $file_name);
      $file_ext=strtolower(end($div));
      $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
      $uploaded_image="uploads/".$unique_image;
  
       if($productName==""||$brand==""||  $category==""||$product_desc==""||$price==""||$type==""){
          $alert="<span class='error'>Fields must be not empty</span>";
          return $alert;
        }else{
          if(!empty($file_name)){
            // nguoi dung chon anh
          if($file_size>20480){
          $alert="<span class='error'>Image size should be less then 5MB! </span>";
          return $alert;
          }elseif(in_array($file_ext, $permited)===false)
          {
           //echo "<span class='success'> You can upload only:-".implode(',',$permited )."</span>";
           $alert="<span class='success'> You can upload only:-".implode(', ',$permited )."</span>";
           return $alert;
          }
           $query="UPDATE tbl_product SET 
           productName='$productName' ,
            catId='$category' ,
             brandId='$brand' ,
              price='$price' ,
               product_desc='$product_desc' ,
               image='$unique_image',
                type='$type'                
           WHERE productId='$id'";
        }   else{
            $query="UPDATE tbl_product SET 
           productName='$productName' ,
            catId='$category' ,
             brandId='$brand' ,
              price='$price' ,
               product_desc='$product_desc' ,           
                type='$type'                
           WHERE productId='$id'";
        } move_uploaded_file($file_temp, $uploaded_image);
          //unlink($unique_image);       
          $update_row=$this->db->update($query);
        if($update_row){
          $alert ="<span class='success'>update Product successfully</span>";
          return $alert;
        }else{
           $alert ="<span class='error'>update Product  not successfully</span>";
          return $alert;
        }
      }
   }
   public function delete_product($id){
    $query="DELETE FROM tbl_product WHERE productId='$id'";
          $delete_row=$this->db->delete($query);
            if( $delete_row){
          $alert ="<span class='success'>Product delete successfully</span>";
          return $alert;
        }else{
           $alert ="<span class='error'>Product delete  not successfully</span>";
          return $alert;
        }
        }
        //end backend
    public function getproduct_featured(){
         $query="SELECT * FROM tbl_product where type='1'Limit 4";
          $result=$this->db->select($query);
          return $result;
    } 
    public function getproduct_new(){
         $sp_tungtrang=4;
         if(!isset($_GET['trang'])){
          $trang =1;
        }else{
          $trang=$_GET['trang'];
        }
        $tung_trang=($trang-1)*$sp_tungtrang;
        $query = "SELECT * FROM tbl_product order by productId desc LIMIT $tung_trang,$sp_tungtrang";
        $result =$this->db->select($query);
        return $result;
        
         
        
    } 
    public function getproduct_all(){
         $query="SELECT * FROM tbl_product ";
          $result=$this->db->select($query);
          return $result;
    } 
     public function get_detail($id){
         $query="SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId=tbl_category.catId 
         INNER JOIN tbl_brand ON tbl_product.brandId=tbl_brand.brandId
        WHERE tbl_product.productId='$id'";
         $result=$this->db->select($query);
          return $result;
    }
    public function getLastestLaForce(){
        $query="SELECT * FROM tbl_product WHERE brandId='9'ORDER BY productId desc LIMIT 1 ";
          $result=$this->db->select($query);
          return $result;
    }
    public function getLastestValentino_Creations(){
        $query="SELECT * FROM tbl_product WHERE brandId='11'ORDER BY productId desc LIMIT 1 ";
          $result=$this->db->select($query);
          return $result;
    }
    public function getLastestTom_Ford(){
        $query="SELECT * FROM tbl_product WHERE brandId='10'ORDER BY productId desc LIMIT 1 ";
          $result=$this->db->select($query);
          return $result;
    }
    public function getLastestSan_Kelloff(){
        $query="SELECT * FROM tbl_product WHERE brandId='12'ORDER BY productId desc LIMIT 1 ";
          $result=$this->db->select($query);
          return $result;
    }


   } 
?>