<?
  class Rectangle{
    public $height = 30; // thuộc tính
    public $weight = 20; // thuộc tính

    //phương thức : hành động làm cái gì đó
    public function getPerimeter(){
        return (2  *($this-> height + $this -> weight));
    }
    //phương thức : hành động làm cái gì đó
    public function getArea(){
        return ($this -> height) * ($this -> weight);
    }
  } 
$cachtinh = new Rectangle();//khoi tao class
echo "Chu vi cua tam giác la: ". $cachtinh ->getPerimeter()."<br>";//goi phuong thuc ra de dung
echo "Dien tich cua tam giác la: ". $cachtinh ->getArea()."<br>";
class hinhtron{
  public $bankinh = 3;
  public $pi = 3.14;
  public function getPerimeters(){
    return $this->bankinh * $this->pi;
  }
  public function getArea(){
    return $this->bankinh * $this->bankinh * ($this->pi * $this->pi ) ;
  }
}
$hinhtron = new hinhtron();
echo "<p>Chu vi cua hinh tron la:". $hinhtron ->getPerimeters() . "</p>"
."<p>Dien tich cua hinh tron la:". $hinhtron ->getArea() . "</p>";

class hinhvuong{
  public $a = 100;
  public function getPerimeters(){
    return 4*$this->a;
  }
  public function getArea(){
    return $this -> a * $this ->a;
  }
}
$hinhvuong = new hinhvuong();
echo "<p>Chu vi cua hinh vuong la:". $hinhvuong ->getPerimeters() . "</p>
<p>Dien tich cua hinh vuong la:". $hinhvuong ->getArea() . "</p>";
