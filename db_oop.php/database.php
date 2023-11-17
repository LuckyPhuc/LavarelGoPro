<?
require "./config.php";
class DB
{

    public $conn;

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

$db ->connection();

