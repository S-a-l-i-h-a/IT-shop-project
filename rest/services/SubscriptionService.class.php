<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/SubscriptionDao.class.php';

class SubscriptionService extends BaseService{

  public function __construct(){
    parent::__construct(new SubscriptionDao());
  }

}

?>
