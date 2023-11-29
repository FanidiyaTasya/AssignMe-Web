<?php 
require_once __DIR__ . ('/../database/Users.php');


class LoginController extends Users {
    protected $email;
    protected $password;
    public $message;

    public function getData($email, $password) {
        $this->email = $email;
        $this->password = $password;

        return $this->validateData();
    }

    public function validateData() {
        if (empty($this->email) || empty($this->password)) {
            return $this->message = 'Please fill out this field!';

        } else {
            return $this->Login();
        }
    }

    public function Login() {
        $row = $this->SQLLogin($this->email, $this->password)->FetchArray();
        
        if ($row !== null && $row['Email'] == $this->email) {
            if (password_verify($this->password, $row['Password'])) {
                $this->handleSuccessfulLogin($row);
            } elseif ($row['Password'] == $this->password) {
                $this->handleSuccessfulLogin($row);
            }
        }
        return $this->message = 'Your email or password is incorrect! Please try again.';
    }
    
    private function handleSuccessfulLogin($row) {
        $_SESSION['UserId'] = $row['UserId'];
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Email'] = $row['Email'];
        // $_SESSION['Password'] = $row['Password']; // Sebaiknya tidak perlu menyimpan password di session
        $_SESSION['Gender'] = $row['Gender'];
    
        header('Location: Dashboard.php');
        exit();
    }
    

    // public function Login() {
    //     $row = $this->SQLLogin($this->email, $this->password)->FetchArray();
    //     if ($row !== null && ($row['Email'] == $this->email && $row['Password'] == $this->password)) {
    //         $_SESSION['UserId'] = $row['UserId'];
    //         $_SESSION['Username'] = $row['Username'];
    //         $_SESSION['Email'] = $row['Email'];
    //         $_SESSION['Password'] = $row['Password'];
    //         $_SESSION['Gender'] = $row['Gender'];

    //         header('Location: Dashboard.php');
    //         exit();
    //     } else {
    //         return $this->message = 'Your email or password is incorrect! Please try again.';
    //     } 
    // }
}
?>