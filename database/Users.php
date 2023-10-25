<?php
 require_once ('Connect.php');

class Users extends Connect {
    protected $sql;
    protected $result;

    public function SQLLogin($email, $password) {
        $this->sql = "SELECT * FROM users WHERE Email='".$email."' AND Password='".$password."'";
        // manggil method getResult u/ eksekusi sql
        return $this->getResult();
    }

    public function SQLRegister($username, $email, $password) {
        $this->sql = "INSERT INTO users (Username, Email, Password). VALUES ('$username', '$email', '$password')";
        return $this->getResult();
    }

    public function SQLValidateEmail($email) {
        // u/ validasi email pada register
        $this->sql = "SELECT * FROM users WHERE Email='".$email."'";
        return $this->getResult();
    }

    public function getResult() {
        // buat eksekusi sql di atas setelah method di atas di panggil
        $this->result = $this->dbConn()->query($this->sql);
        return $this;
    }

    public function FetchArray() {
        // u/ masukkan data yg di database kedlm variabel array
        $row = $this->result->fetch_array();
        return $row;
    }
} 
?>