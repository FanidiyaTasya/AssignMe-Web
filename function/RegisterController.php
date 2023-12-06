<?php 
require_once __DIR__ . ('/../database/Users.php');

class RegisterController extends Users {

    protected $username;
    protected $email;
    protected $password;
    protected $confirmPass;
    public $message;

    public function getData($username, $email, $password, $confirmPass) {
        $this->username     = $username;
        $this->email        = $email;
        $this->password     = $password;
        $this->confirmPass  = $confirmPass;

        return $this->validateData();
    }

    public function validateData() {
        if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirmPass)) {
            $this->message = "Please fill out this field!";
            return $this->message;
        } else if ($this->password !== $this->confirmPass) {
            $this->message = "Password do not match!";
            return $this->message;
        } else if ($this->isEmailUsed($this->email)) {
            $this->message = "Email has already been used!";
            return $this->message;
        } else {
            return $this->Register();
        }
    }

    public function isEmailUsed($email) {
        $result = $this->SQLValidateEmail($email);

        if ($result) {
            $row = $result->FetchArray();
            if ($row !== null && isset($row['Email'])) {
                return ($row['Email'] == $email);
            } else {
                $this->message = "Email data not found in the result.";
                return false;
            }
        } else {
            $this->message = "Error validating email.";
            return false;
        }
    }

    public function Register() {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = $this->SQLRegister($this->username, $this->email, $hashedPassword);
        
        if ($sql) {
            $_SESSION['Email'] = $this->email;
            $_SESSION['Password'] = $hashedPassword;
            header("Location: Login.php");
            exit();
        } else {
            $this->message = "Registration failed. Please try again.";
            return $this->message;
        }
    }    
}
?>
