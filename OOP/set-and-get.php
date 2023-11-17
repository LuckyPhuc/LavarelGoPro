<?
class Demo {

    private $attribute_1;
    // set đặt, gán giá trị cho private
    function setValues($value){
        $this->attribute_1 = $value;
    }
    // get lấy giá trị 
    function getValues(){
        return $this-> attribute_1;
    }
}

$a = new Demo;

$a -> setValues(10);

echo "xuất giá trị của a" . "<br>";
echo $a -> getValues() . "<br>";

class Rectangle{
    private $height ; // thuộc tính
    private $width ; // thuộc tính
    // $height và $width là các đối số của hàm setValue.
    // Trong lập trình, đối số (hay còn gọi là tham số) là các giá trị được truyền vào một hàm khi nó được gọi.
    // Trong trường hợp này, khi hàm setValue được gọi, bạn sẽ cần cung cấp hai giá trị: một cho $height (chiều cao) và một cho $width (chiều rộng).
    public function setValue($height,$width){
        $this->height= $height; // $this -> height thuộc tính của đối tượng, $height sau dấu bằng là đối số
        $this->width = $width;
    }
    
    public function getPerimeter(){
        return (2*($this->height+$this->width));
    }
    public function getArea(){
        return ($this->height)*($this->width);
    }

  }

  $b = new Rectangle;
//Trong PHP, ký hiệu -> được sử dụng để truy cập các thuộc tính và phương thức của một đối tượng. Khi bạn làm việc với lập trình hướng đối tượng trong PHP
  $b -> setValue(20,40);
  
  $b -> getPerimeter();
  echo "Chu vi là " . $b ->getPerimeter() ."<br>";
  $area = $b -> getArea();
  echo "Dien tích là " . $area;
?>