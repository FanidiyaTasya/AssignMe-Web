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
        $this->sql = "INSERT INTO users (Username, Email, Password, Gender, Role) VALUES ('$username', '$email', '$password', NULL, 'Guru')";
        return $this->getResult();
    }

    public function SQLValidateEmail($email) {
        $this->sql = "SELECT * FROM users WHERE Email='".$email."'";
        return $this->getResult();
    }

    public function ShowTeacher($classId) { 
        $this->sql = "SELECT users.Username
        FROM users
        JOIN user_classes ON users.UserId = user_classes.UserId
        WHERE user_classes.ClassId = $classId AND users.Role = 'Guru'";
        return $this->getResult();
    }

    public function ShowStudent($classId) {
        $this->sql = "SELECT users.Username
        FROM users
        JOIN user_classes ON users.UserId = user_classes.UserId
        WHERE user_classes.ClassId = $classId AND users.Role = 'Siswa'";
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