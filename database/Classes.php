<?php 
require_once('Connect.php');

class Classes extends Connect {
    protected $sql;
    protected $result;

    public function InsertClass($className, $desc, $classCode, $userId) {
        $this->sql = "INSERT INTO classes (ClassName, Description, ClassCode, UserId) VALUES ('$className', '$desc', '$classCode', '$userId')";
        echo $this->sql;
        return $this->getResult();
    }

    public function ShowClass() {
        $this->sql = "SELECT * FROM classes";
        return $this->getResult();
    }

    public function EditClass($classId, $className, $desc, $classCode, $userId) {
        $this->sql = "UPDATE classes SET ClassName='$className', Description='$desc', ClassCode='$classCode', UserId='$userId' WHERE ClassId=$classId";
        return $this->getResult();
    }

    public function DeleteClass($classId) {
        $this->sql = "DELETE FROM classes WHERE ClassId=$classId";
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