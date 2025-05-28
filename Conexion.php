<?php 
class Conexion {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "ejemplo_web2";
    private $port = 3307; 

    private $conexion;
   
    public function __construct() {
        
        $this->conexion = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->db_name,
            $this->port
        );
    
        if ($this->conexion->connect_error) {
            die("Conexión falló: " . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function __destruct() {
        $this->conexion->close();
        echo "Se destruyó la conexión";
    }
}
?>
