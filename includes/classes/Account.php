<?php

class Account {
    private $con;
    private $errorarray = array();

    public function __construct($con){
        $this->con = $con;
    }

    public function register($fn, $ln, $un, $em1, $em2, $pw1, $pw2){
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUserName($un);
        $this->validateEmail($em1, $em2);
        $this->validatePassword($pw1, $pw2);

        if(empty($this->errorarray)){
            return $this->insertUserDetails($fn, $ln, $un, $em1 ,$pw1);
        }

        return false;
    }

    public function login($un, $pw){
        $pw = hash("sha512", $pw);
        
        $query = $this->con->prepare("SELECT * FROM users WHERE username = :un AND password = :pw");

        $query->bindValue(":un", $un);
        $query->bindValue(":pw", $pw);

        $query->execute();

        if($query->rowCount() == 1){
            return true;
        }

        array_push($this->errorarray, Constants::$loginFailed);

        return false;


    }


    private function insertUserDetails($fn, $ln, $un, $em1 ,$pw1){
        
        //to secure password
        $pw1 = hash("sha512", $pw1);

        $query = $this->con->prepare("INSERT INTO users (firstName, lastName, username, email, password) 
                                    VALUES (:fn, :ln, :un, :em1, :pw1)");
        $query->bindValue(":fn", $fn);
        $query->bindValue(":ln", $ln);
        $query->bindValue(":un", $un);
        $query->bindValue(":em1", $em1);
        $query->bindValue(":pw1", $pw1);

        return $query->execute();
    }

    private function validateFirstName($fn){
        if (strlen($fn)<3 || strlen($fn)>25){
            array_push($this->errorarray, Constants::$firstnamechar);
        }
    }

    private function validateLastName($ln){
        if (strlen($ln)<3 || strlen($ln)>25){
            array_push($this->errorarray, Constants::$lastnamechar);
        }
    }

    //function to retain info on the page

    public function get_input_data($x){
        if(isset($_POST["$x"])){
            echo $_POST["$x"];
        }
    }

    private function validateUserName($un){
        if (strlen($un)<5 || strlen($un)>25){
            array_push($this->errorarray, Constants::$usernamechar);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
        $query->bindValue(":un", $un);
        $query->execute();

        if($query->rowCount()!=0){
            array_push($this->errorarray, Constants::$usernameTaken);
        }
    }

    private function validateEmail($em1, $em2){
        if ($em1 != $em2){
            array_push($this->errorarray, Constants::$diffEmail);
            return;
        }
        if(!filter_var($em1, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorarray, Constants::$emailInvalid);
            return;
        }
        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em1");
        $query->bindValue(":em1", $em1);
        $query->execute();

        if($query->rowCount()!=0){
            array_push($this->errorarray, Constants::$emailTaken);
        }
    }

    private function validatePassword($pw1, $pw2){
        if ($pw1 != $pw2){
            array_push($this->errorarray, Constants::$diffpass);
            return;
        }

        if (strlen($pw1)<4 || strlen($pw1)>25){
            array_push($this->errorarray, Constants::$passchar);
        }
    }

    public function getErr($err){
        if(in_array($err, $this->errorarray)){
            return "<span class='error_message'>$err</span>";
        }
    }
}

?>