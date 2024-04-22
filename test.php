<?php



class User{

    public $username;
    public $email;

    public function __construct($username, $email){
        $this->username = $username;
        $this->email =$email;
    }

}



class child extends User{
    public function __construct($username, $email, $childname){

        parent::__construct($username, $email);
        $this->childname = $childname;

    }
    public function display(){

        echo $this->username;
        echo $this->email;
        echo $this->childname; 
    }


    public function __toString(){
        return $this->username. "" . $this->email;
    }




}
$obj = new child("rohan", "rohan@gmail.com", "aarav");
echo $obj;
