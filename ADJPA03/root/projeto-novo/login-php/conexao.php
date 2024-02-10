<?php 
class Conexao extends PDO { 
    private $database = "mysql: host=localhost; port=3307; dbname=site_exemplo; charset=utf8;";
    private $user = "root";
    private $password = "usbw";
    public static $handle = null;
    
    function __construct() {
        try{
            if(self::$handle == null) {
            $connection_data = parent::__construct($this->database, $this->user, $this->password);
            self::$handle = $connection_data;
            return self::$handle;
            }
        }   
        catch(PDOException $e) {
            echo "Falha na conexão: " . $e->getMessage();
            return false;
            }
    }   
    function __destruct() {
        self::$handle = null;
    }
}    
?>