<?php
 require_once ('Connect.php');

class Users extends Connect {
    protected $sql;
    protected $result;

    public function SQLLogin($email) {
        $this->sql = "SELECT * FROM users WHERE Email='".$email."'";
        return $this->getResult();
    }

    public function SQLRegister($username, $email, $password) {
        $this->sql = "INSERT INTO users (Username, Email, Password, Role) VALUES ('$username', '$email', '$password', 'Guru')";
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
        $this->sql = "SELECT users.Username, user_classes.UserId
        FROM users
        JOIN user_classes ON users.UserId = user_classes.UserId
        WHERE user_classes.ClassId = $classId AND users.Role = 'Siswa'";
        return $this->getResult();
    }

    public function ShowProfileData($userId) {
        $this->sql = "SELECT * FROM users WHERE UserId = '$userId'";
        return $this->getResult();
    }

    public function UpdateData($userId, $newUsername, $newEmail, $newGender) {
        $this->sql = "UPDATE users SET username = '$newUsername', email = '$newEmail', Gender = '$newGender' WHERE UserId = '$userId'";
        return $this->getResult();
    }

    public function UpdateProfile($userId, $profile) {
        $this->sql = "UPDATE users SET Profile = '$profile' WHERE UserId = '$userId'";
        return $this->getResult();
    }

    public function CountUser($classId) {
        $this->sql = "SELECT COUNT(user_classes.UserId)
        FROM user_classes
        JOIN users ON user_classes.UserId = users.UserId
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