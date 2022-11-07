<?php 
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>


<?php
/**
  * 
  */
 class category 
 	{
 		private $db;
 		private $fm;
 	public function __construct()
 	{
 		$this->db=new Database();
 		$this->fm= new Format();
 	}
 	public function insert_category($catName){
       $catName=$this->fm->validation($catName);   
       $catName=mysqli_real_escape_string($this->db->link,$catName);
        if(empty($catName)){
        	$alert="Category must be not empty";
        	return $alert;
        }else{
        	$query="INSERT INTO tbl_category(catName) VALUES('$catName')";

        	$insert_row=$this->db->insert($query);

        if($insert_row){
          $alert ="Insert Category";
        	return $alert;
        }else{
           $alert ="Insert Category not success";
          return $alert;
        }
        }
 	}
  public function show_category(){
      $query="SELECT * FROM tbl_category ORDER BY catId desc";
          $result=$this->db->select($query);
          return $result;
  }
  public function getcatbyId($id)
  {
    $query="SELECT * FROM tbl_category where catId='$id'";
          $result=$this->db->select($query);
          return $result;
  }
  public function update_category($catName,$id)
  {
   $catName=$this->fm->validation($catName);    
  $catName=mysqli_real_escape_string($this->db->link,$catName);
   $id=mysqli_real_escape_string($this->db->link,$id);
     if(empty($catName)){
          $alert="<span class='error'>Category must be not empty</span>";
          return $alert;
        }else{
          $query="UPDATE tbl_category SET catName='$catName' WHERE catId='$id'";

          $update_row=$this->db->update($query);

        if($update_row){
          $alert ="<span class='success'>Category updated successfully</span>";
          return $alert;
        }else{
           $alert ="<span class='error' >Category updated not successfully</span>";
          return $alert;
        }
        }
   }
   public function delete_category($id){
    $query="DELETE FROM tbl_category WHERE catId='$id'";
          $delete_row=$this->db->delete($query);
            if( $delete_row){
          $alert ="Category deleted successfully";
          return $alert;
        }else{
           $alert ="Category deleted not successfully";
          return $alert;
        }
        } 

      public  function get_all_category(){
           $query="SELECT * FROM tbl_category ORDER BY catId desc";
          $result=$this->db->select($query);
          return $result;
      }
      public function get_product_by_cat($id){
           $query="SELECT * FROM tbl_product WHERE catId='$id' ORDER BY catId desc LIMIT 12";
          $result=$this->db->select($query);
          return $result;
      }
      public function get_name_product_by_cat($id)
      {
       $query="SELECT tbl_product.*,tbl_category.catName,tbl_category.catId FROM  tbl_product,tbl_category  WHERE 
        tbl_product.catId=tbl_category.catId AND tbl_product.catId='$id' LIMIT 1";
          $result=$this->db->select($query);
          return $result;
      }

   } 
?>