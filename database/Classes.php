<?php 
require_once('Connect.php');

class Classes extends Connect {
    protected $sql;
    protected $result;

    public function InsertClass($className, $subject, $desc, $classCode, $userId) {
        $this->sql = "INSERT INTO classes (ClassName, SubjectName, Description, ClassCode, UserId) VALUES ('$className', '$subject', '$desc', '$classCode', '$userId')";
        return $this->getResult();
    }

    public function InsertUserClasses($userId, $classId, $role) {
        $this->sql = "INSERT INTO user_classes (UserId, ClassId, Role) VALUES ('$userId', '$classId', '$role')";
        return $this->getResult();
    }

    public function ShowClass($userId) {
        $this->sql = "SELECT * FROM classes WHERE UserId = '$userId'";
        return $this->getResult();
    }

    public function UpdateClass($classId, $className, $subject, $desc) {
        $this->sql = "UPDATE classes SET ClassName='$className', SubjectName='$subject', Description='$desc' WHERE ClassId='$classId'";
        return $this->getResult();
    }
    
    public function UpdateClassCode($classId, $newClassCode) {
        $this->sql = "UPDATE classes SET ClassCode='$newClassCode' WHERE ClassId='$classId'";
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