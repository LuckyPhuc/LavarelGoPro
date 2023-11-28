<?
class Rectangle{
    // khi dùng static thì từ khóa khi gọi trong hàm là self
    // ngược lại, thì khi khởi tạo đối tượng thì dùng $this
    // lớp xài static thì phương thức phải khai báo static
    public static $height ;
    public static $width ; 

    public static function getPerimeter(){
        return (2*(self::$height + self::$width));
    }
    
    public static function getArea(){
        return (self::$height)*(self::$width);
    }
}

Rectangle::$height = 10;
Rectangle::$width = 20;

// $test = Rectangle::getPerimeter();
// echo  $test;
// echo Rectangle::getPerimeter();
// khởi tạo lớp demo
class Demo{
    // public $a = 1;
    // public $b = 2;
    // //hàm khởi tạo
    // public function __construct()
    // {
    //     $this-> a = 4;
    //     $this-> b = 6;
    //     echo $this->a ." và ". $this->b;
    // }
    
    public function __construct()
    {   
        Rectangle::$height = 5;
        Rectangle::$width = 4;

        // $test = Rectangle::getPerimeter();
        // echo  $test;
        echo Rectangle::getPerimeter();
    }
    }
    new Demo;
?>
