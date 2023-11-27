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
    //LỌC DỮ LIỆU BẰNG ESCAPE 
    function escape_string($str){
        return $this -> conn -> real_escape_string($str);
    }
    //run Sql
    function query($sql){
        return $this -> conn -> query($sql);
    }
    //Select
    //Select column1, column2, column3,....
    //from table_name Where ....
    function get($table,$field = array(),$where=''){
       $field = !empty($field) ? implode(',',$field) : $field ="*";
    // Cấu trúc của toán tử này là condition ? expr1 : expr2
    // nghĩa là nếu condition là true, expr1 sẽ được thực hiện,
    // còn nếu false thì expr2 sẽ được thực hiện
        $where = !empty($where) ? "WHERE {$where}":"";

        $sql = "SELECT {$field} FROM {$table} {$where}";
        echo $sql;
        //nếu có dữ liệu thì trả bản ghi (hàng)

        $result = $this ->query($sql);
        if($result -> num_rows > 0){
            $data = array();
            while ($row = $result -> fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        // không sẽ trả giá trị không có tồn tại trong database
        else{
            echo "Bản ghi không tồn tại ";
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
        foreach($data as $column => $value){
            $list_field[] = "`{$column}`";
            $list_value[] = "'{$this->escape_string($value)}'";
        }
        // Hàm sử dụng implode để biến mảng $list_field và $list_value thành chuỗi.
        // Mỗi phần tử trong mảng được nối với nhau bằng dấu phẩy, tạo thành chuỗi các tên trường và chuỗi các giá trị tương ứng.
        $list_field = implode(',',$list_field);
        $list_value = implode(',',$list_value);
        // Cuối cùng, hàm tạo ra một câu lệnh SQL dựa trên các chuỗi đã được tạo ra.
        // Câu lệnh INSERT INTO được sử dụng để chèn các giá trị ($list_value) vào các trường tương ứng ($list_field) của bảng ($table).
        $sql = "INSERT INTO {$table}({$list_field})
        VALUES ({$list_value})";

        if($this->query($sql) == TRUE){
            return $this -> conn -> insert_id;
            // insert_id mà là một thuộc tính của đối tượng mysqli
        }
        else{
            echo "Lỗi" . $this->conn->error;
        }
        // echo $sql;
    }
    //update 
    //update table name
    //set column1 = value1, column2 = value2
    //where condition
    function update($table , $data= array(),$where = ""){
        $data_insert = array();
        foreach($data as $column => $value){
            $data_insert[] = "`{$column}`= '{$value}'";
        }
        $data_insert = implode(',',$data_insert);
        $where = !empty($where) ? "WHERE {$where}":"";
        $sql = "UPDATE {$table} SET {$data_insert} {$where}";
        if($this ->query($sql) == TRUE){
            echo "Cập nhật thành công";
        }
        else{
            echo "Cập nhật thất bại";
        }
    }
    //delete
    //delete
    // DELETE FROM table_name WHERE condition;
    function delete($table,$where=""){
        $where = !empty($where) ? "WHERE {$where}":"";
        $sql = "DELETE FROM {$table} {$where}";
        if($this->query($sql)==TRUE){
            echo "Xóa thành công";
        }
        else{
            echo "Xóa thất bại";
        }
    }
}

$db = new DB ;
    $data = array (
       'username'=> "Hoang Phuc",
       'password'=> password_hash("hoangphuc0062",PASSWORD_DEFAULT)
    );
    // echo $db -> insert('users',$data);
    // $users  = $db -> get('users',$data,"id = 2");
    // echo '<pre>';
    // print_r($users);
    // echo '<pre>';

    // echo $db -> update("Users",$data,"id = 3").'<br>';
    echo $db -> delete("Users",'gmail="nguyenphuc50@gmail.com"');
