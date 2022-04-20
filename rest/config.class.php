<?php

class Config {

  public static function DB_HOST(){
    return Config::get_env("DB_HOST", "localhost");
  }
  public static function DB_USERNAME(){
    return Config::get_env("DB_USERNAME", "ITShop");
  }
  public static function DB_PASSWORD(){
    return Config::get_env("DB_PASSWORD", "ITShop");
  }
  public static function DB_SCHEME(){
    return Config::get_env("DB_SCHEME", "ITShop");
  }
  public static function DB_PORT(){
    return Config::get_env("DB_PORT", "25060");
  }

  public static function get_env($name, $default){
   return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
  }
}

?>