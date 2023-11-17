<?
require "./config.php";
class DB
{

    public $conn;
    // Trong phương thức __construct, $this->connection(); 
    //có ý nghĩa là gọi phương thức connection trên đối tượng hiện tại ($this). 
    //Điều này khởi tạo kết nối cơ sở dữ liệu và lưu trữ nó trong thuộc tính conn của đối tượng:
    function __construct()
    {
        $this->connection();
    }

    //không nói rõ là public hay privated là public
    function connection()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ( $this->conn->connect_error) {
            die("Kết nối cơ sở dữ liệu không thành công" .  $this->conn->connect_error);
        } else {
            echo "kết nối CSDL thành công";
        }
    }
}
$db = new DB ;
