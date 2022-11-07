<?php 
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>


<?php
/**
  * 
  */
 class brand
  {
    private $db;
    private $fm;
  public function __construct()
  {
    $this->db=new Database();
    $this->fm= new Format();
  }
  public function insert_brand($brandName){
      $brandName=$this->fm->validation($brandName);   
      $brandName=mysqli_real_escape_string($this->db->link,$brandName);
        if(empty($brandName)){
          $alert="<span class='error'>Brand must be not empty</span>";
          return $alert;
        }else{
          $query="INSERT INTO tbl_brand(brandName) VALUES('$brandName')";

          $insert_row=$this->db->insert($query);

        if($insert_row){
          $alert ="<span class='success'>Insert Brand success</span>";
          return $alert;
        }else{
           $alert ="<span class='error'>Insert Brand not success</span>";
          return $alert;
        }
        }
  }
  public function show_brand(){
      $query="SELECT * FROM tbl_brand ORDER BY brandId desc";
          $result=$this->db->select($query);
          return $result;
  }
  public function getcatbyId($id)
  {
    $query="SELECT * FROM tbl_brand where brandId='$id'";
          $result=$this->db->select($query);
          return $result;
  }
  public function update_brand($brandName,$id)
  {
   $brandName=$this->fm->validation($brandName);    
  $brandName=mysqli_real_escape_string($this->db->link,$brandName);
   $id=mysqli_real_escape_string($this->db->link,$id);
     if(empty($brandName)){
          $alert="Brand must be not empty";
          return $alert;
        }else{
          $query="UPDATE tbl_brand SET brandName='$brandName' WHERE brandId='$id'";

          $update_row=$this->db->update($query);

        if($update_row){
          $alert ="<span class='success'>Brand updated successfully</span>";
          return $alert;
        }else{
           $alert ="<span class='error'>Brand updated not successfully</span>";
          return $alert;
        }
        }
   }
   public function delete_brand($id){
    $query="DELETE FROM tbl_brand WHERE brandId='$id'";
          $delete_row=$this->db->delete($query);
            if( $delete_row){
          $alert ="<span class='success'>Brand deleted successfully</span>";
          return $alert;
        }else{
           $alert ="<span class='error'>Brand deleted not successfully</span>";
          return $alert;
        }
        } 
   } 
?>