<?
    class User{
        private $userName;
        private $userPassword;
        private $db_name = "nguyenphuc0062";
        private $db_password ="Nguyenphuc@0062";

        public function setInfor($userName , $userPassword){
            $this->userName = $userName;
            $this->userPassword = $userPassword;
        }
        public function checkInfor(){
            if($this->userName === $this->db_name){
                if($this->userPassword === $this-> db_password){
                    echo "Hello " .$this->db_name."<br>";
                }
                else{
                    echo "UserName or PassWord is wrong"."<br>";
                }
            }
            else{
                echo "Account is'nt exist !"."<br>";
            }
        }

    }
    
    $a = new User;
    $a -> setInfor("nguyenphuc0062" , "Nguyenphuc@0062");
    $a -> checkInfor();

?>