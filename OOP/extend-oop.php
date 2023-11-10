<?
    class A{
        public $attribute_A= 10;
        protected $attribute_A1 =20;
        private $atrribute_A2 ="Tiền của bố m";
        
        public function method_A(){
            echo $this->attribute_A = "method A";
        }
        public function method_A2(){
            return $this->atrribute_A2;
        }
    }
    //khai báo lớp B là con A
    class B extends A{
        public $attribute_B = 10;

        public function method_B(){
            // kế thừa từ lớp cha
            return $this->attribute_A1 + $this->attribute_B;
        }
        // không cho phép gọi
        // public function method_B2(){
        //     return $this->attribute_A2;
        // }
    }
    class C extends B{
        public $attribute_C =30;

        public function method_C(){
            return $this->attribute_A1 + $this->attribute_C;
        }
    }
    class D {
        public $d = 90;

        public function method_D(A $a){
            return $a->attribute_A + $this->d;
        }
    }
    $a = new A;
    $a -> method_A2();
    echo "method_A=". $a -> method_A2(). "</br>";
    //khởi tạo đối tượng là b
    $b = new B;
    //khai báo phương thức
    $b -> method_B();
    echo "method_B=" .$b -> method_B()."</br>";
    //$a -> method_A();
    $c = new C;
    $c ->method_C();
    echo "method_C=".$c -> method_C()."</br>";

    $d = new D;
    $d -> method_D($a);
    echo "method_D=" .$d -> method_D($a);
?>
