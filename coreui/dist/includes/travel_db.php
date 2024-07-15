<?php
class Database
{
  private static $hostname = "localhost";
  private static $username = "root";
  private static $password = "";
  private static $dbname = "travel_agency";
  private static $connection = null;

  public static function connect()
  {
    if (!self::$connection) {
      try {
        self::$connection = new PDO(
          "mysql:host=" . self::$hostname . ";dbname=" . self::$dbname,
          self::$username,
          self::$password
        );
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
      }
    }
    return self::$connection;
  }

  public function disconnect()
  {
    self::$connection = null;
  }
}
