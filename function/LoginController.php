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
        $row = $this->SQLLogin($this->email)->FetchArray();

        if ($row['Role'] === 'Guru') {
            if (password_verify($this->password, $row['Password']) || $this->password === $row['Password']) {
                $this->performLogin($row);
            } else {
                return $this->message = 'Your email or password is incorrect! Please try again.';
            }
        } elseif ($row['Role'] === 'Siswa') {
            return $this->message = 'User not found!';
        } else {
            return $this->message = 'Unknown user.';
        }
    }

    
    private function performLogin($row) {
        $_SESSION['UserId'] = $row['UserId'];
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['Gender'] = $row['Gender'];
    
        header('Location: Dashboard.php');
        exit();
    }
}
?>