<?php
require_once __DIR__.'/BaseDao.class.php';

class ProductDao extends BaseDao{

  /**
  * constructor of dao class
  */
  public function __construct(){
    parent::__construct("products");
  }

  public function getAllProdcuts($search=NULL){
  $query = "SELECT * FROM products WHERE 0=:num";
  if(isset($search)){
    $query .= " AND title LIKE '%".$search."%' ";
  }
  return $this->query($query,['num'=>"0"]);
}


}

?>
