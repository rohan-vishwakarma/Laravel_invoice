<?php



class User{

    public $username;
    public $email;

    public function __construct($username, $email){
        $this->username = $username;
        $this->email =$email;
    }

    public function __toString()
    {
        return $this->email;
    }

    
    public function __destruct()
    {
        echo "the method destroyed";
    }

}

$obj = new User("rohan-vishwakarma", "rohanvishwakarma685@gmail.com");
echo $obj;

