<?php

require_once __DIR__.'/BaseDao.class.php';

class OrderDao extends BaseDao{

  public function __construct(){
    parent::__construct("orders");
  }
