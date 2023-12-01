<?php 
require_once('Connect.php');

class Classes extends Connect {
    protected $sql;
    protected $result;
    protected $errorMessage;

    public function InsertClass($className, $subject, $desc, $classCode) {
        $this->sql = "INSERT INTO classes (ClassName, SubjectName, Description, ClassCode) VALUES ('$className', '$subject', '$desc', '$classCode')";
        return $this->getResult();
    }

    public function InsertUserClasses($userId, $classId) {
        $this->sql = "INSERT INTO user_classes (UserId, ClassId) VALUES ('$userId', '$classId')";
        return $this->getResult();
    }

    public function ShowClass($userId) {
        $this->sql = "SELECT classes.* FROM classes 
        JOIN user_classes ON classes.ClassId = user_classes.ClassId
        JOIN users ON user_classes.UserId = users.UserId WHERE users.UserId = '$userId'";
        return $this->getResult();
    }

    public function isClassExists($className, $subject) {
        $query = "SELECT COUNT(*) as count FROM classes WHERE LOWER(ClassName) = LOWER('$className') AND LOWER(SubjectName) = LOWER('$subject')";
        $result = $this->dbConn()->query($query);

        $count = 0;
        if (!$result) {
            $this->errorMessage = $this->dbConn()->error;
        } else {
            $row = $result->fetch_assoc();

            if ($row) {
                $count = $row['count'];
            }
            $result->free_result();
        }
        return $count > 0;
    }

    // public function updateTaskStatus($taskId, $newStatus) {
    //     $this->sql = "UPDATE tasks SET Status = '$newStatus' WHERE TaskId = '$taskId'";
    //     $this->getResult();
    // }

    public function UpdateClass($classId, $className, $subject, $desc) {
        $this->sql = "UPDATE classes SET ClassName='$className', SubjectName='$subject', Description='$desc' WHERE ClassId='$classId'";
        return $this->getResult();
    }
    
    public function UpdateClassCode($classId, $newClassCode) {
        $this->sql = "UPDATE classes SET ClassCode='$newClassCode' WHERE ClassId='$classId'";
        return $this->getResult();
    }  

    public function DeleteClass($classId, $userId) {
        $this->sql = "DELETE FROM user_classes WHERE ClassId = '$classId' AND UserId = '$userId'";
        return $this->getResult();
    }

    public function getResult() {
        $this->result = $this->dbConn()->query($this->sql);
        if (!$this->result) {
            $this->errorMessage = $this->dbConn()->error;
        }
        return $this;
    }

    public function FetchArray() {
        $row = $this->result->fetch_array();
        return $row;
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }
}

?>