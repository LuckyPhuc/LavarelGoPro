<?
  class Rectangle{
    public $height = 30; // thuộc tính
    public $weight = 20; // thuộc tính

    //phương thức : hành động làm cái gì đó
    public function getPerimeter(){
        return (2*($this->height+$this->weight));
    }
    //phương thức : hành động làm cái gì đó
    public function getArea(){
        return ($this->height)*($this->weight);
    }
  }
