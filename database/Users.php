<?php
 require_once ('Connect.php');

class Users extends Connect {
    protected $sql;
    protected $result;

    public function SQLLogin($email, $password) {
        $this->sql = "SELECT * FROM users WHERE Email='".$email."' AND Password='".$password."'";
        return $this->getResult();
    }

    public function SQLRegister($username, $email, $password) {
        $this->sql = "INSERT INTO users (Username, Email, Password) VALUES ('$username', '$email', '$password')";
        return $this->getResult();
    }

    public function SQLValidateEmail($email) {
        $this->sql = "SELECT * FROM users WHERE Email='".$email."'";
        return $this->getResult();
    }

    public function ShowTeacher($classId) { 
        $this->sql = "SELECT users.Username 
        FROM user_classes
        JOIN users ON user_classes.UserId = users.UserId
        WHERE user_classes.ClassId = $classId AND user_classes.Role = 'Guru'";
        return $this->getResult();
    }

    public function ShowStudent($classId) {
        $this->sql = "SELECT users.Username 
        FROM user_classes
        JOIN users ON user_classes.UserId = users.UserId
        WHERE user_classes.ClassId = $classId AND user_classes.Role = 'Siswa'";
        return $this->getResult();
    }

    public function getResult() {
        $this->result = $this->dbConn()->query($this->sql);
        return $this;
    }

    public function FetchArray() {
        $row = $this->result->fetch_array();
        return $row;
    }
} 
?>