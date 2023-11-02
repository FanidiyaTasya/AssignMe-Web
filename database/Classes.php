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
        // var_dump($this->sql);
        return $this->getResult();
    }

    public function ShowClass() {
        $this->sql = "SELECT * FROM classes";
        return $this->getResult();
    }

    public function EditClass($classId, $className, $subject, $desc, $classCode, $userId) {
        $this->sql = "UPDATE classes SET ClassName='$className', SubjectName='$subject', Description='$desc', ClassCode='$classCode', UserId='$userId' WHERE ClassId='$classId'";
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