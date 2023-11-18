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
            echo "kết nối CSDL thành công" .'<br>';
        }
    }
    //insert
    // $table là tên của bảng cơ sở dữ liệu mà bạn muốn chèn dữ liệu vào.
    // $data là một mảng associative, với key là tên cột và value là giá trị tương ứng cần chèn vào bảng.
    function insert($table,$data){
        // INSERT INTO table_name(`column1`,`column2`,`column3`,...)
        // VALUES (`value1,value2`,`value3`);
        // Hàm sử dụng vòng lặp foreach để duyệt qua mảng $data.
        // Trong mỗi lần lặp, nó lấy key ($k) và value ($v) từ mảng $data.
        // $k (key) được thêm vào mảng $list_field, và $v (value) được thêm vào mảng $list_value.
        foreach($data as $k => $v){
            $list_field[] = "`{$k}`";
            $list_value[] = "'{$v}'";
        }
        // Hàm sử dụng implode để biến mảng $list_field và $list_value thành chuỗi.
        // Mỗi phần tử trong mảng được nối với nhau bằng dấu phẩy, tạo thành chuỗi các tên trường và chuỗi các giá trị tương ứng.
        $list_field = implode(',',$list_field);
        $list_value = implode(',',$list_value);
        // Cuối cùng, hàm tạo ra một câu lệnh SQL dựa trên các chuỗi đã được tạo ra.
        // Câu lệnh INSERT INTO được sử dụng để chèn các giá trị ($list_value) vào các trường tương ứng ($list_field) của bảng ($table).
        $sql = "INSERT INTO {$table}({$list_field})
        VALUES ({$list_value})";

        if($this->conn->query($sql) == TRUE){
            return $this -> conn -> insert_id;
            // insert_id mà là một thuộc tính của đối tượng mysqli
        }
        else{
            echo "Lỗi" . $this->conn->error;
        }
        echo $sql;
    }
}
$db = new DB ;
    $data = array (
        'username' => 'hoang_phuc134',
        'password' => password_hash('hoangphuc1234',PASSWORD_DEFAULT) ,
        'gmail' => 'nguyenphuc50@gmail.com'
    );
    echo $db -> insert('users',$data);
