<?php
require_once __DIR__.'/BaseDao.class.php';

class UserDao extends BaseDao{

  /**
  * constructor of dao class
  */
  public function __construct(){
    parent::__construct("users");
  }
/**
* method that wll return user from database
*/
  public function get_user_by_username($username){
    return $this->query_unique("SELECT * FROM adminlogin WHERE username = :username", ['username' => $username]);
  }

}

?>
