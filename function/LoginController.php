<?php 
require_once __DIR__ . ('\..\database\Users.php');


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
            $this->message = "Please fill out this field!";
            return $this->message;
            header("Location: Login.php");

        } else {
            return $this->Login();
        }
    }

    public function Login() {
        $row = $this->SQLLogin($this->email, $this->password)->FetchArray();
        // if($email == $row['Email'] && password_verify($password, $row['Password'])){
        //     try {
        //         $apiKey = bin2hex(random_bytes(23));
        //     } catch (Exception $e) {
        //         $apiKey = bin2hex(uniqid($email, true));
        //     }
        //     $sqlUpdate = "UPDATE users SET apiKey = '".$apiKey."' WHERE Email = '".$email."'";
        if ($row !== null && ($row['Email'] == $this->email && $row['Password'] == $this->password)) {
            $_SESSION['UserId'] = $row['UserId'];
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Password'] = $row['Password'];

            header('Location: Dashboard.php');
            exit();

        } else {
            $this->message = "Your email or password is incorrect! Please try again.";
            return $this->message;
            header("Location: Login.php");
            exit();
        } 
    }
}
?>