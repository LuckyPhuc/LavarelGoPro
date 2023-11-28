<?
  class Rectangle{
    public $height ; // thuộc tính
    public $width ; // thuộc tính
  // khi khởi tạo lớp Rectangle thì __construct nó tự mặc định chạy đầu tiên
    public function __construct()
    {
      $this->height = 10;
      $this->width = 20;
    }
    
    //phương thức : hành động làm cái gì đó
    public function getPerimeter(){
        return (2*($this->height+$this->width));
    }
    //phương thức : hành động làm cái gì đó
    public function getArea(){
        return ($this->height)*($this->width);
    }

  }
  // new khởi tạo đối tượng vào lớp đã cho trước
  // cho trước 1: người ta đã xây dựng rồi.
  // cho trước 2: mình tự xây dựng.
  // khởi tạo đối tượng 
  // đối tượng có thể là 1 số, 1 ký tự, 1 phương thức(function()), 1 đối tượng , 1 mảng(array) , 1 chuỗi(string)
  $a = new Rectangle;
  //khởi tạo phương thức
  //echo $a -> getArea();
  echo $a ->getPerimeter();
   /* echo "<pre>";
   var_dump($a);
   echo "<pre>"; */
?>
