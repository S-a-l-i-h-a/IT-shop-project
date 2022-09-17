<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/ProductDao.class.php';

class ProductService extends BaseService{

  public function __construct(){
    parent::__construct(new ProductDao());
  }

  public function getAllProdcuts($search=NULL){
    return $this->dao->getAllProdcuts($search);
  }

}

?>
