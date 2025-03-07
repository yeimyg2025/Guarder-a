<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'mordida_de_flujo_db';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function __construct() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
    }

    public function authenticateUser($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', sha1($password)); // Asegúrate que hayas hecho hash a las contraseñas al registrarlas
        $stmt->execute();
        
        return $stmt->rowCount() > 0;
    }
}
?>