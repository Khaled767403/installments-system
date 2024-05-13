<!-- 
    create databse on phpmyadmin 
 -->
<?php
class Database {
    private $servername = "localhost";
    private $dbname = "db";

    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, "root", "", $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function insert($value) {

        $sql =" INSERT INTO cust ( `name`, `p_name`, `price`, `advance`, `number_of_installments`, `percent`, `installment price`, `buy_date`) VALUES ($value)";
        mysqli_query($this->conn, $sql);

    }

    public function fetchAll($table) {
        $sql = "SELECT * FROM $table WHERE number_of_installments > 0";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function decrementInstallments($id) {
        $sql = "UPDATE cust SET number_of_installments = number_of_installments - 1 WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>

